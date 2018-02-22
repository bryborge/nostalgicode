<?php

    // CLASS DECLARATION
    class Store
    {

        // PROPERTIES
        private $name;
        private $id;

        // CONSTRUCTOR
        function __construct($new_name, $new_id = null)
        {
            $this->name = $new_name;
            $this->id   = $new_id;
        }

        // GETTERS
        function getName()
        {
            return $this->name;
        }

        function getId()
        {
            return $this->id;
        }

        // SETTERS
        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function setId($new_id)
        {
            $this->id = $new_id;
        }


        // DB FUNCTIONS
        // Crud
        function save()
        {
            $statement = $GLOBALS['DB']->query("INSERT INTO stores (name) VALUES ('{$this->getName()}') RETURNING id;");
            $id_row    = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($id_row['id']);
        }

        // Crud
        function addBrand($brand)
        {
            $GLOBALS['DB']->exec("INSERT INTO brands_stores (brands_id, stores_id) VALUES ({$brand->getId()}, {$this->getId()});");
        }

        // cRud
        function getBrands()
        {
            $statement = $GLOBALS['DB']->query("SELECT brands.* FROM stores
                                                    JOIN brands_stores ON (stores.id = brands_stores.stores_id)
                                                    JOIN brands ON (brands_stores.brands_id = brands.id)
                                                    WHERE stores.id = {$this->getId()};");
            $brands_rows = $statement->fetchAll(PDO::FETCH_ASSOC);

            $brands = [];
            foreach ($brands_rows as $row) {
                $name = $row['name'];
                $id = $row['id'];
                $new_brand = new Brand($name, $id);
                array_push($brands, $new_brand);
            }
            return $brands;
        }

        // crUd
        function update($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE stores SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }

        // cruD
        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM stores * WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM brands_stores * WHERE stores_id = {$this->getId()};");
        }


        // STATIC FUNCTIONS
        // cRud
        static function getAll()
        {
            $statement   = $GLOBALS['DB']->query("SELECT * FROM stores;");
            $stores_rows = $statement->fetchAll(PDO::FETCH_ASSOC);

            $stores = [];
            foreach ($stores_rows as $row) {
                $name      =$row['name'];
                $id        = $row['id'];
                $new_store = new Store($name, $id);
                array_push($stores, $new_store);
            }
            return $stores;
        }

        // cRud
        static function findById($search_id)
        {
            $statement  = $GLOBALS['DB']->query("SELECT * FROM stores WHERE id = {$search_id};");
            $stores_row = $statement->fetchAll(PDO::FETCH_ASSOC);

            $found_store = null;
            foreach ($stores_row as $row) {
                $name        = $row['name'];
                $id          = $row['id'];
                $found_store = new Store($name, $id);
            }
            return $found_store;
        }

        // cRud
        static function findByName($search_name)
        {
            $statement  = $GLOBALS['DB']->query("SELECT * FROM stores WHERE name LIKE '%{$search_name}%';");
            $stores_row = $statement->fetchAll(PDO::FETCH_ASSOC);

            $found_stores = [];
            foreach ($stores_row as $row) {
                $name        = $row['name'];
                $id          = $row['id'];
                $found_store = new Store($name, $id);
                array_push($found_stores, $found_store);
            }
            return $found_stores;
        }

        // cruD
        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stores *;");
            $GLOBALS['DB']->exec("DELETE FROM brands_stores *;");
        }

    }

?>
