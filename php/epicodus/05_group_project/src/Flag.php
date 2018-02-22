<?php

    class Flag
    {
        private $flag_type;
        private $id;

        function __construct($flag_type, $initial_id=null) {
            $this->flag_type = $flag_type;
            $this->id = $initial_id;
        }

        function getFlagType() {
            return $this->flag_type;
        }

        function setFlagType($new_flag_type) {
            $this->flag_type = $new_flag_type;
        }

        function getId() {
            return $this->id;
        }

        function setId($new_id) {
            $this->id = (int) $new_id;
        }

        // db

        function save() {
            $statement = $GLOBALS['DB']->query("INSERT INTO flags (flag_type) VALUES ('{$this->getFlagType()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        function updateFlagType($new_flag_type) {
            $GLOBALS['DB']->exec("UPDATE flags SET flag_type = '{$new_flag_type}' WHERE id = {$this->getId()};");
            $this->setFlagType($new_flag_type);
        }

        function delete() {
            $GLOBALS['DB']->exec("DELETE FROM clients_flags WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM flags WHERE id = {$this->getId()};");
        }

        // static functions
        static function getAll() {
            $returned_flags = $GLOBALS['DB']->query("SELECT * FROM flags;");
            $flags = array();
            foreach($returned_flags as $flag) {
                $flag_type = $flag['flag_type'];
                $id = $flag['id'];
                $new_flag = new Flag($flag_type, $id);
                array_push($flags, $new_flag);
            }
            return $flags;
        }

        static function deleteAll() {
            $GLOBALS['DB']->exec("DELETE FROM clients_flags;");
            $GLOBALS['DB']->exec("DELETE FROM flags;");
        }

        static function find($id) {
            $statement = $GLOBALS['DB']->query("SELECT * FROM flags WHERE id = {$id};");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $flag = new Flag($result['flag_type'], $result['id']);
            return $flag;
        }


    }
?>
