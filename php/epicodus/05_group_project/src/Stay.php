<?php

    class Stay {
        private $intake_date_time;
        private $exit_date_time;
        private $run_risk;
        private $exited_by;
        private $lice;
        private $destination;
        private $id;

        function __construct($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination, $id = null) {
            $this->intake_date_time = $intake_date_time;
            $this->exit_date_time = $exit_date_time;
            $this->run_risk = $run_risk;
            $this->exited_by = $exited_by;
            $this->lice = $lice;
            $this->destination = $destination;
            $this->id = $id;
        }

        // getters
        function getIntakeDateTime() {
            return $this->intake_date_time;
        }

        function getExitDateTime() {
            return $this->exit_date_time;
        }

        function getRunRisk() {
            return $this->run_risk;
        }

        function getExitedBy() {
            return $this->exited_by;
        }

        function getLice() {
            return $this->lice;
        }

        function getDestination() {
            return $this->destination;
        }

        function getId() {
            return $this->id;
        }

        // setters (normal)

        function setIntakeDateTime($intake_date_time) {
            $this->intake_date_time = $intake_date_time;
        }

        function setExitDateTime($exit_date_time) {
            $this->exit_date_time = $exit_date_time;
        }

        function setRunRisk($run_risk) {
            $this->run_risk = $run_risk;
        }

        function setExitedBy($exited_by) {
            $this->exited_by = $exited_by;
        }

        function setLice($lice) {
            $this->lice = $lice;
        }

        function setDestination($destination) {
            $this->destination = $destination;
        }

        function setId($id) {
            $this->id = $id;
        }

        // setters (db-specific)

        function set_intake_date_time($intake_date_time) {
            $this->intake_date_time = $intake_date_time;
        }

        function set_exit_date_time($exit_date_time) {
            $this->exit_date_time = $exit_date_time;
        }

        function set_run_risk($run_risk) {
            $this->run_risk = $run_risk;
        }

        function set_exited_by($exited_by) {
            $this->exited_by = $exited_by;
        }

        function set_lice($lice) {
            $this->lice = $lice;
        }

        function set_destination($destination) {
            $this->destination = $destination;
        }

        function set_id($id) {
            $this->id = $id;
        }

        // DB functions

        function save() {
            $statement = $GLOBALS['DB']->query("INSERT INTO stays (intake_date_time, exit_date_time, run_risk, exited_by, destination, lice) VALUES ('{$this->getIntakeDateTime()}', '{$this->getExitDateTime()}', '{$this->getRunRisk()}', '{$this->getExitedBy()}', '{$this->getDestination()}', '{$this->getLice()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        function saveNewIntake() {
            $statement = $GLOBALS['DB']->query("INSERT INTO stays (intake_date_time, run_risk, lice) VALUES ('{$this->getIntakeDateTime()}', '{$this->getRunRisk()}', '{$this->getLice()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        function addIntakeStaff($intake_staff) {
            $GLOBALS['DB']->exec("INSERT INTO intake_staff_stays (intake_staff_id, stays_id) VALUES ({$intake_staff->getId()}, {$this->getId()});");
        }

        function removeIntakeStaff($intake_staff) {
            $GLOBALS['DB']->exec("DELETE FROM intake_staff_stays WHERE intake_staff_id = {$intake_staff->getId()};");
        }

        function getIntakeStaff() {
            $returned_results = $GLOBALS['DB']->query("SELECT intake_staff.* FROM intake_staff JOIN intake_staff_stays ON (intake_staff_id = intake_staff.id) JOIN stays ON (stays.id = stays_id) WHERE stays_id = {$this->getId()};");

            $intake_staff = [];
            foreach($returned_results as $result) {
                $new_intake_staff = new IntakeStaff($result['name'], $result['id']);
                array_push($intake_staff, $new_intake_staff);
            }
            return $intake_staff;
        }

        function addMeds($med) {
            $GLOBALS['DB']->exec("INSERT INTO meds_stays (meds_id, stays_id) VALUES ({$med->getId()}, {$this->getId()});");
        }

        function removeMeds($med) {
            $GLOBALS['DB']->exec("DELETE FROM meds_stays WHERE meds_id = {$med->getId()};");
        }

        function getMeds() {
            $returned_results = $GLOBALS['DB']->query("SELECT meds.* FROM meds JOIN meds_stays ON (meds_id = meds.id) JOIN stays ON (stays.id = stays_id) WHERE stays_id = {$this->getId()};");

            $meds = [];
            foreach($returned_results as $result) {
                $new_med = new Med($result['med_name'], $result['dosage'], $result['time_of_day'], $result['notes'], $result['id']);
                array_push($meds, $new_med);
            }
            return $meds;
        }

        //pg fetch array

        function addSocialWorker($social_worker) {
            $GLOBALS['DB']->exec("INSERT INTO social_workers_stays (social_workers_id, stays_id) VALUES ({$social_worker->getId()}, {$this->getId()});");
        }

        function removeSocialWorker($social_worker) {
            $GLOBALS['DB']->exec("DELETE FROM social_workers_stays WHERE social_workers_id = {$social_worker->getId()};");
        }

        function getSocialWorkers() {
            $returned_results = $GLOBALS['DB']->query("SELECT social_workers.* FROM social_workers JOIN social_workers_stays ON (social_workers_id = social_workers.id) JOIN stays ON (stays.id = stays_id) WHERE stays_id = {$this->getId()};");

            $social_workers = [];
            foreach($returned_results as $result) {
                $new_social_worker = new SocialWorker($result['name'], $result['id']);
                array_push($social_workers, $new_social_worker);
            }
            return $social_workers;
        }

        function delete() {
            $GLOBALS['DB']->exec("DELETE FROM intake_staff_stays WHERE stays_id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM meds_stays WHERE stays_id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM social_workers_stays WHERE stays_id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM stays WHERE id = {$this->getId()};");
        }

        function update($form_array) {
            foreach($form_array as $field=>$value) {
                if($value) {
                    $GLOBALS['DB']->exec("UPDATE stays SET {$field} = {$value} WHERE id = {$this->getId()};");
                    $field_name = "set_" . $field;
                    $this->$field_name($value);
                }
            }
        }


        // static functions

        static function getAll() {
            $returned_results = $GLOBALS['DB']->query("SELECT * FROM stays;");
            $stays = [];
            foreach($returned_results as $result) {
                $new_stay = new Stay($result['intake_date_time'], $result['exit_date_time'], $result['run_risk'], $result['exited_by'], $result['lice'], $result['destination'], $result['id']);
                array_push($stays, $new_stay);
            }
            return $stays;
        }

        static function find($id) {
            $statement = $GLOBALS['DB']->query("SELECT * FROM stays WHERE id = {$id};");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $new_stay = new Stay($result['intake_date_time'], $result['exit_date_time'], $result['run_risk'], $result['exited_by'], $result['lice'], $result['destination'], $result['id']);
            return $new_stay;
        }

        static function search($form_array) {
            $search_results = [];
            $search_string = "";

            if(!empty($form_array)) {
                foreach($form_array as $field => $value) {
                    if ($value) {
                        $search_string .= $field . " LIKE '%" . $value . "%' AND ";
                    }
                }

                $search_string = substr($search_string, 0, strlen($search_string) - 5);


                $returned_results = $GLOBALS['DB']->query("SELECT * FROM stays WHERE {$search_string};");
                foreach($returned_results as $result) {
                    $new_stay = new Stay($result['intake_date_time'], $result['exit_date_time'], $result['run_risk'], $result['exited_by'], $result['lice'], $result['destination'], $result['id']);

                    array_push($search_results, $new_stay);
                }

            }
            return $search_results;
        }

        static function deleteAll() {
            $GLOBALS['DB']->exec("DELETE FROM intake_staff_stays;");
            $GLOBALS['DB']->exec("DELETE FROM meds_stays;");
            $GLOBALS['DB']->exec("DELETE FROM social_workers_stays;");
            $GLOBALS['DB']->exec("DELETE FROM stays;");
        }


    }

?>
