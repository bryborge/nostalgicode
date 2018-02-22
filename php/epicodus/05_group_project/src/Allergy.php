<?php

    class Allergy {
        private $allergy_type;
        private $id;

        function __construct($allergy_type, $id = null) {
            $this->allergy_type = $allergy_type;
            $this->id = $id;
        }

        // getters

        function getAllergyType() {
            return $this->allergy_type;
        }

        function getId() {
            return $this->id;
        }

        // setters

        function setAllergyType($allergy_type) {
            $this->allergy_type = $allergy_type;
        }

        function setId($id) {
            $this->id = $id;
        }

        // DB functions

        function save() {
            $statement = $GLOBALS['DB']->query("INSERT INTO allergies (allergy_type) VALUES ('{$this->getAllergyType()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        function update($allergy_type) {
            $GLOBALS['DB']->exec("UPDATE allergies SET allergy_type = '{$allergy_type}' WHERE id = {$this->getId()};");
            $this->setAllergyType($allergy_type);

        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM allergies_clients WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM allergies WHERE id = {$this->getId()};");
        }


        // static functions

        static function getAll() {
            $returned_results = $GLOBALS['DB']->query("SELECT * FROM allergies;");
            $allergies = [];
            foreach($returned_results as $result) {
                $new_allergy = new Allergy($result['allergy_type'], $result['id']);
                array_push($allergies, $new_allergy);
            }
            return $allergies;
        }

        static function deleteAll() {
            $GLOBALS['DB']->exec("DELETE FROM allergies_clients;");
            $GLOBALS['DB']->exec("DELETE FROM allergies;");
        }

        static function find($id) {
            $statement = $GLOBALS['DB']->query("SELECT * FROM allergies WHERE id = {$id};");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $new_allergy = new Allergy($result['allergy_type'], $result['id']);
            return $new_allergy;
        }
    }

?>
