<?php

    require_once "Client.php";

    class Stylist
    {
        //PROPERTIES
        private $id;
        private $name;

        //CONSTRUCTOR
        function __construct($id, $name)
        {
            $this->id = $id;
            $this->name = $name;
        }

        //SETTERS
        function setId($new_id)
        {
            $this->id = $new_id;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        //GETTERS
        function getId()
        {
            return $this->id;
        }

        function getName()
        {
            return $this->name;
        }

        //Crud - CREATE
        function save()
        {
            $statement = $GLOBALS['DB']->query("INSERT INTO stylists (name) VALUES ('{$this->getName()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        //cRud - READ
        function getClients()
        {
            $clients = Array();
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients WHERE stylist_id = {$this->getId()};");
            foreach ($returned_clients as $client) {
                $id = $client['id'];
                $name = $client['name'];
                $stylist_id = $client['stylist_id'];
                $new_client = new Client($id, $name, $stylist_id);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        static function getAll()
        {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");

            $stylists = array();
            foreach ($returned_stylists as $stylist) {
                $id = $stylist['id'];
                $name = $stylist['name'];
                $new_stylist = new Stylist($id, $name);
                array_push($stylists, $new_stylist);
            }
            return $stylists;
        }

        static function find($search_id)
        {
            $found_stylist = array();
            $stylists = Stylist::getAll();
            foreach ($stylists as $stylist) {
                $stylist_id = $stylist->getId();
                if ($stylist_id == $search_id) {
                    $found_stylist = $stylist;
                }
            }
            return $found_stylist;
        }

        //crUd - UPDATE
        function update($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE stylists SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }

        //cruD - DELETE
        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM clients WHERE stylist_id = {$this->getId()};");
        }

        function deleteClients()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients WHERE stylist_id = {$this->getId()};");
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists *;");
        }

    }

?>
