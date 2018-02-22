<?php

    class Med {
        private $med_name;
        private $dosage;
        private $time_of_day;
        private $notes;
        private $id;

        function __construct($med_name, $dosage, $time_of_day, $notes, $id = null) {
            $this->med_name = $med_name;
            $this->dosage = $dosage;
            $this->time_of_day = $time_of_day;
            $this->notes = $notes;
            $this->id = $id;
        }

        // getters

        function getMedName() {
            return $this->med_name;
        }

        function getDosage() {
            return $this->dosage;
        }

        function getTimeOfDay() {
            return $this->time_of_day;
        }

        function getNotes() {
            return $this->notes;
        }

        function getId() {
            return $this->id;
        }

        // setters

        function setMedName($med_name) {
            $this->med_name = $med_name;
        }

        function setDosage($dosage) {
            $this->dosage = $dosage;
        }

        function setTimeOfDay($time_of_day) {
            $this->time_of_day = $time_of_day;
        }

        function setNotes($notes) {
            $this->notes = $notes;
        }

        function setId($id) {
            $this->id = $id;
        }

        // DB functions

        function save() {
            $statement = $GLOBALS['DB']->query("INSERT INTO meds (med_name, dosage, time_of_day, notes) VALUES ('{$this->getMedName()}', '{$this->getDosage()}', '{$this->getTimeOfDay()}', '{$this->getNotes()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        function delete() {
            $GLOBALS['DB']->exec("DELETE FROM meds_stays WHERE meds_id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM meds WHERE id = {$this->getId()};");
        }

        function updateMedName($med_name) {
            $GLOBALS['DB']->exec("UPDATE meds SET med_name = '{$med_name}' WHERE id = {$this->getId()};");
        }

        function updateDosage($dosage) {
            $GLOBALS['DB']->exec("UPDATE meds SET dosage = '{$dosage}' WHERE id = {$this->getId()};");
        }

        function updateTimeOfDay($time_of_day) {
            $GLOBALS['DB']->exec("UPDATE meds SET time_of_day = '{$time_of_day}' WHERE id = {$this->getId()};");
        }

        function updateNotes($notes) {
            $GLOBALS['DB']->exec("UPDATE meds SET notes = '{$notes}' WHERE id = {$this->getId()};");
        }

        // static functions

        static function getAll() {
            $returned_results = $GLOBALS['DB']->query("SELECT * FROM meds ORDER BY med_name;");
            $meds = [];
            foreach($returned_results as $result) {
                $new_med = new Med($result['med_name'], $result['dosage'], $result['time_of_day'], $result['notes'], $result['id']);
                array_push($meds, $new_med);
            }
            return $meds;
        }

        static function deleteAll() {
            $GLOBALS['DB']->exec("DELETE FROM meds_stays;");
            $GLOBALS['DB']->exec("DELETE FROM meds;");
        }

        static function find($id) {
            $query = $GLOBALS['DB']->query("SELECT * FROM meds WHERE id = {$id};");
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $med = new Med($result['med_name'], $result['dosage'], $result['time_of_day'], $result['notes'], $result['id']);
            return $med;
        }

        static function search($words) {
            $results = $GLOBALS['DB']->query("SELECT * FROM meds WHERE UPPER(med_name) || UPPER(notes) LIKE UPPER('%{$words}%') ORDER BY med_name;");
            $meds = [];
            foreach($results as $result) {
                $new_med = new Med($result['med_name'], $result['dosage'], $result['time_of_day'], $result['notes'], $result['id']);
                array_push($meds, $new_med);
            }
            return $meds;
        }

    }
?>
