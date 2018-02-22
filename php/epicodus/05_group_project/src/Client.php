<?php

    class Client
    {
        private $id;
        private $last_name;
        private $first_name;
        private $alias;
        private $dob;
        private $gender;
        private $race;
        private $ethnicity;
        private $notes;
        private $admit_status;
        private $last_assessed;

        function __construct($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null)
        {
            $this->last_name = $last_name;
            $this->first_name = $first_name;
            $this->alias = $alias;
            $this->dob = $dob;
            $this->gender = $gender;
            $this->race = $race;
            $this->ethnicity = $ethnicity;
            $this->notes = $notes;
            $this->admit_status = $admit_status;
            $this->last_assessed = $last_assessed;
            $this->id = $id;
        }

        //----getters------------------------

        function getLastName() {
            return $this->last_name;

        }

        function getFirstName() {
            return $this->first_name;
        }

        function getAlias() {
            return $this->alias;
        }

        function getDob() {
            return $this->dob;
        }

        function getGender() {
            return $this->gender;
        }

        function getRace() {
            return $this->race;
        }

        function getEthnicity() {
            return $this->ethnicity;
        }

        function getNotes() {
            return $this->notes;
        }

        function getAdmitStatus() {
            return $this->admit_status;
        }

        function getId() {
            return $this->id;
        }

        function getLastAssessed() {
            return $this->last_assessed;
        }

        //-----setters-----------------------------

        function setFirstName($new_first_name) {
            $this->first_name = (string) $new_first_name;
        }

        function setLastName($new_last_name) {
            $this->last_name = (string) $new_last_name;
        }

        function setAlias($new_alias) {
            $this->alias = (string) $new_alias;
        }

        function setDob($new_dob) {
            $this->dob = $new_dob;
        }

        function setGender($new_gender) {
            $this->gender = $new_gender;
        }

        function setRace($new_race) {
            $this->race = $new_race;
        }

        function setEthnicity($new_ethnicity) {
            $this->ethnicity = $new_ethnicity;
        }

        function setNotes($new_notes) {
            $this->notes = $new_notes;
        }

        function setAdmitStatus($new_admit_status) {
            $this->admit_status = $new_admit_status;
        }

        function setLastAssessed($new_last_assessed) {
            $this->last_assessed = $new_last_assessed;
        }

        function setId($new_id) {
            $this->id = (int) $new_id;
        }

        //---------------DB functions----------------------

        function save() {
            $statement = $GLOBALS['DB']->query("INSERT INTO clients (last_name, first_name, alias, dob, gender, race, ethnicity, notes, admit_status, last_assessed) VALUES ('{$this->getLastName()}',
            '{$this->getFirstName()}',
            '{$this->getAlias()}',
            '{$this->getDob()}',
            '{$this->getGender()}',
            '{$this->getRace()}',
            '{$this->getEthnicity()}',
            '{$this->getNotes()}',
            '{$this->getAdmitStatus()}',
            '{$this->getLastAssessed()}')
            RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        function delete() {
            //Add delete from join table FIRST....
            $GLOBALS['DB']->exec("DELETE FROM clients_flags WHERE clients_id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM clients_stays WHERE clients_id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM allergies_clients WHERE clients_id = {$this->getId()};");

            $GLOBALS['DB']->exec("DELETE FROM clients WHERE id = {$this->getId()};");
        }

        //---------------------UPDATE-FUNCTIONS-------------------

        function updateLastName($name) {
            $GLOBALS['DB']->exec("UPDATE clients SET last_name = '{$name}' WHERE id = {$this->getId()};");
            $this->setLastName($name);
        }

        function updateFirstName($name) {
            $GLOBALS['DB']->exec("UPDATE clients SET first_name = '{$name}' WHERE id = {$this->getId()};");
            $this->setFirstName($name);
        }

        function updateAlias($name) {
            $GLOBALS['DB']->exec("UPDATE clients SET alias = '{$name}' WHERE id = {$this->getId()};");
            $this->setAlias($name);
        }

        function updateDob($dob) {
            $GLOBALS['DB']->exec("UPDATE clients SET dob = '{$dob}' WHERE id = {$this->getId()};");
            $this->setDob($dob);
        }

        function updateGender($gender) {
            $GLOBALS['DB']->exec("UPDATE clients SET gender = '{$gender}' WHERE id = {$this->getId()};");
            $this->setGender($gender);
        }

        function updateRace($race) {
            $GLOBALS['DB']->exec("UPDATE clients SET race = '{$race}' WHERE id = {$this->getId()};");
            $this->setRace($race);
        }

        function updateEthnicity($ethnicity) {
            $GLOBALS['DB']->exec("UPDATE clients SET ethnicity = '{$ethnicity}' WHERE id = {$this->getId()};");
            $this->setEthnicity($ethnicity);
        }

        function updateNotes($notes) {
            $GLOBALS['DB']->exec("UPDATE clients SET notes = '{$notes}' WHERE id = {$this->getId()};");
            $this->setNotes($notes);
        }

        function updateAdmitStatus($admit_status) {
            $GLOBALS['DB']->exec("UPDATE clients SET admit_status = '{$admit_status}' WHERE id = {$this->getId()};");
            $this->setAdmitStatus($admit_status);
        }

        function updateLastAssessed($last_assessed) {
            $GLOBALS['DB']->exec("UPDATE clients SET last_assessed = '{$last_assessed}' WHERE id = {$this->getId()};");
            $this->setLastAssessed($last_assessed);
        }

        //Seanna's function
        function updateString($value, $new_thingy) {
          $GLOBALS['DB']->exec("UPDATE clients SET {$value} = '{$new_thingy}' WHERE id = {$this->getId()};");
        }

        //------------------------------------------------

        //------------------CLIENT/FLAG-JOIN------------
        function addFlag($flag) {
            $GLOBALS['DB']->exec("INSERT INTO clients_flags (clients_id, flags_id) VALUES ({$this->getId()}, {$flag->getId()});");
        }

        function getFlags() {
            $returned_results = $GLOBALS['DB']->query("SELECT flags.* FROM clients JOIN clients_flags ON (clients.id = clients_flags.clients_id) JOIN flags ON (clients_flags.flags_id = flags.id) WHERE clients.id = {$this->getId()};");

            $all_flags = [];

            foreach($returned_results as $result) {
                $new_flag = new Flag($result['flag_type'], $result['id']);
                array_push($all_flags, $new_flag);
            }
            return $all_flags;
        }

        function removeFlag($flag) {
            $GLOBALS['DB']->exec("DELETE FROM clients_flags WHERE flags_id = {$flag->getId()};");
        }
        //-----------------------------------------------

        //------------------CLIENT/ALLERGY-JOIN----------

        function addAllergy($allergy) {
            $GLOBALS['DB']->exec("INSERT INTO allergies_clients (allergies_id, clients_id) VALUES ({$allergy->getId()}, {$this->getId()});");
        }

        function getAllergies() {
            $returned_results = $GLOBALS['DB']->query("SELECT allergies.* FROM clients JOIN allergies_clients ON (clients.id = allergies_clients.clients_id) JOIN allergies ON (allergies_clients.allergies_id = allergies.id) WHERE clients.id = {$this->getId()};");

            $allergies = [];

            foreach($returned_results as $result) {
                $new_allergy = new Allergy($result['allergy_type'], $result['id']);
                array_push($allergies, $new_allergy);
            }
            return $allergies;
        }

        function removeAllergy($allergy) {
            $GLOBALS['DB']->exec("DELETE FROM allergies_clients WHERE allergies_id = {$allergy->getId()};");
        }

        //-----------------------------------------------

        //------------------CLIENT/STAY-JOIN-------------
        function addStay($stay) {
            $GLOBALS['DB']->exec("INSERT INTO clients_stays (clients_id, stays_id) VALUES ({$this->getId()}, {$stay->getId()});");
        }

        function getStays() {
            $returned_results = $GLOBALS['DB']->query("SELECT * FROM clients JOIN clients_stays ON (clients.id = clients_stays.clients_id) JOIN stays ON (stays.id = clients_stays.stays_id) WHERE clients.id = {$this->getId()} ORDER BY stays.intake_date_time;");
            $stays = [];
            foreach($returned_results as $result) {
                $new_stay = new Stay($result['intake_date_time'], $result['exit_date_time'], $result['run_risk'], $result['exited_by'], $result['lice'], $result['destination'], $result['id']);
                array_push($stays, $new_stay);
            }
            return $stays;
        }

        function getCurrentStay() {
            $returned_results = $GLOBALS['DB']->query("SELECT * FROM clients JOIN clients_stays ON (clients.id = clients_stays.clients_id) JOIN stays ON (stays.id = clients_stays.stays_id) WHERE exit_date_time IS NULL AND clients_id = {$this->getId()};");

            $stays = [];
            foreach($returned_results as $result) {
                $new_stay = new Stay($result['intake_date_time'], $result['exit_date_time'], $result['run_risk'], $result['exited_by'], $result['lice'], $result['destination'], $result['id']);
                array_push($stays, $new_stay);
            }
            return $stays[0];
        }

        function removeStay($stay) {
            $GLOBALS['DB']->exec("DELETE FROM clients_stays WHERE stays_id = {$stay->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM stays WHERE stays_id = {$stay->getId()};");
        }
        //---------------------------------------------

        //-----------------STATIC-FUNCTIONS------------

        static function getAll() {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = array();
            foreach($returned_clients as $client) {
                $last_name = $client['last_name'];
                $first_name = $client['first_name'];
                $alias = $client['alias'];
                $dob = $client['dob'];
                $gender = $client['gender'];
                $race = $client['race'];
                $ethnicity = $client['ethnicity'];
                $notes = $client['notes'];
                $admit_status = $client['admit_status'];
                $last_assessed = $client['last_assessed'];
                $id = $client['id'];
                $new_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id);
                array_push($clients, $new_client);
            }
            return $clients;
        }
        //maybe remove notes, gender, ethicity
        static function search($search_term) {
            $results = $GLOBALS['DB']->query("SELECT * FROM clients WHERE UPPER(last_name) || UPPER(first_name) || UPPER(alias) || UPPER(gender) || UPPER(race) || UPPER(ethnicity) || UPPER(notes) || UPPER(admit_status) LIKE UPPER('%{$search_term}%') ORDER BY last_name;");
            $clients = [];
            foreach($results as $result) {
                $new_client = new Client($result['last_name'], $result['first_name'], $result['alias'], $result['dob'], $result['gender'], $result['race'], $result['ethnicity'], $result['notes'], $result['admit_status'], $result['last_assessed'], $result['id']);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        static function deleteAll() {
            $GLOBALS['DB']->exec("DELETE FROM clients_stays;");
            $GLOBALS['DB']->exec("DELETE FROM allergies_clients;");
            $GLOBALS['DB']->exec("DELETE FROM clients_flags;");
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }

        static function find($id) {
            $statement = $GLOBALS['DB']->query("SELECT * FROM clients WHERE id = {$id};");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $client = new Client($result['last_name'], $result['first_name'], $result['alias'], $result['dob'], $result['gender'], $result['race'], $result['ethnicity'], $result['notes'], $result['admit_status'], $result['last_assessed'], $result['id']);
            return $client;
        }

    }

?>
