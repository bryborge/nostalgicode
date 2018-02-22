<?php

    class IntakeStaff {
        private $name;
        private $id;

        function __construct($name, $id = null) {
            $this->name = $name;
            $this->id = $id;
        }

        // getters

        function getName() {
            return $this->name;
        }

        function getId() {
            return $this->id;
        }

        // setters

        function setName($name) {
            $this->name = $name;
        }

        function setId($id) {
            $this->id = $id;
        }

        // DB functions

        function save() {
            $statement = $GLOBALS['DB']->query("INSERT INTO intake_staff (name) VALUES ('{$this->getName()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        function delete() {
            $GLOBALS['DB']->exec("DELETE FROM intake_staff_stays WHERE intake_staff_id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM intake_staff WHERE id = {$this->getId()};");
        }

        function updateName($name) {
            $GLOBALS['DB']->exec("UPDATE intake_staff SET name = '{$name}' WHERE id = {$this->getId()};");
        }

        // static functions

        static function getAll() {
            $returned_results = $GLOBALS['DB']->query("SELECT * FROM intake_staff ORDER BY name;");
            $staff = [];
            foreach($returned_results as $result) {
                $new_staff = new IntakeStaff($result['name'], $result['id']);
                array_push($staff, $new_staff);
            }
            return $staff;
        }

        static function deleteAll() {
            $GLOBALS['DB']->exec("DELETE FROM intake_staff_stays;");
            $GLOBALS['DB']->exec("DELETE FROM intake_staff;");
        }

        static function find($id) {
            $query = $GLOBALS['DB']->query("SELECT * FROM intake_staff WHERE id = {$id};");
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $staff = new IntakeStaff($result['name'], $result['id']);
            return $staff;
        }

        static function search($name) {
            $results = $GLOBALS['DB']->query("SELECT * FROM intake_staff WHERE UPPER(name) LIKE UPPER('%{$name}%') ORDER BY name;");
            $staff = [];
            foreach ($results as $result) {
                $new_staff = new IntakeStaff($result['name'], $result['id']);
                array_push($staff, $new_staff);
            }
            return $staff;
        }

    }

?>
