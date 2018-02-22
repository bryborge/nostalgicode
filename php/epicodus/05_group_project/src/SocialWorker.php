<?php

    class SocialWorker {
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
            $statement = $GLOBALS['DB']->query("INSERT INTO social_workers (name) VALUES ('{$this->getName()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        function delete() {
            $GLOBALS['DB']->exec("DELETE FROM social_workers_stays WHERE social_workers_id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM social_workers WHERE id = {$this->getId()};");
        }

        function updateName($name) {
            $GLOBALS['DB']->exec("UPDATE social_workers SET name = '{$name}' WHERE id = {$this->getId()};");
        }

        // static functions

        static function getAll() {
            $returned_results = $GLOBALS['DB']->query("SELECT * FROM social_workers ORDER BY name;");
            $staff = [];
            foreach($returned_results as $result) {
                $new_staff = new SocialWorker($result['name'], $result['id']);
                array_push($staff, $new_staff);
            }
            return $staff;
        }

        static function deleteAll() {
            $GLOBALS['DB']->exec("DELETE FROM social_workers_stays;");
            $GLOBALS['DB']->exec("DELETE FROM social_workers;");
        }

        static function find($id) {
            $query = $GLOBALS['DB']->query("SELECT * FROM social_workers WHERE id = {$id};");
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $staff = new SocialWorker($result['name'], $result['id']);
            return $staff;
        }

        static function search($name) {
            $results = $GLOBALS['DB']->query("SELECT * FROM social_workers WHERE UPPER(name) LIKE UPPER('%{$name}%') ORDER BY name;");
            $staff = [];
            foreach ($results as $result) {
                $new_staff = new SocialWorker($result['name'], $result['id']);
                array_push($staff, $new_staff);
            }
            return $staff;
        }

    }

?>
