<?php

    // CLASS DECLARATION
    class Brand
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
            $statement = $GLOBALS['DB']->query("INSERT INTO brands (name) VALUES ('{$this->getName()}') RETURNING id;");
            $id_row    = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($id_row['id']);
        }

        // Crud
        function addStore($store)
        {
            $GLOBALS['DB']->exec("INSERT INTO brands_stores (brands_id, stores_id) VALUES ({$this->getId()}, {$store->getId()});");
        }

        // cRud
        function getStores()
        {
            $statement = $GLOBALS['DB']->query("SELECT stores.* FROM brands
                                                    JOIN brands_stores ON (brands.id = brands_stores.brands_id)
                                                    JOIN stores ON (brands_stores.stores_id = stores.id)
                                                    WHERE brands.id = {$this->getId()};");
            $stores_rows = $statement->fetchAll(PDO::FETCH_ASSOC);

            $stores = [];
            foreach ($stores_rows as $row) {
                $name = $row['name'];
                $id = $row['id'];
                $new_store = new Store($name, $id);
                array_push($stores, $new_store);
            }
            return $stores;
        }

        // crUd
        function update($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE brands SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }

        // cruD
        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM brands * WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM brands_stores * WHERE brands_id = {$this->getId()};");
        }


        // STATIC FUNCTIONS
        // cRud
        static function getAll()
        {
            $statement   = $GLOBALS['DB']->query("SELECT * FROM brands;");
            $brands_rows = $statement->fetchAll(PDO::FETCH_ASSOC);

            $brands = [];
            foreach ($brands_rows as $row) {
                $name      = $row['name'];
                $id        = $row['id'];
                $new_brand = new Brand($name, $id);
                array_push($brands, $new_brand);
            }
            return $brands;
        }

        // cRud
        static function findById($search_id)
        {
            $statement  = $GLOBALS['DB']->query("SELECT * FROM brands WHERE id = {$search_id};");
            $brands_row = $statement->fetchAll(PDO::FETCH_ASSOC);

            $found_brand = null;
            foreach ($brands_row as $row) {
                $name        = $row['name'];
                $id          = $row['id'];
                $found_brand = new Brand($name, $id);
            }
            return $found_brand;
        }

        // cRud
        static function findByName($search_name)
        {
            $statement  = $GLOBALS['DB']->query("SELECT * FROM brands WHERE name LIKE '%{$search_name}%';");
            $brands_row = $statement->fetchAll(PDO::FETCH_ASSOC);

            $found_brands = [];
            foreach ($brands_row as $row) {
                $name        = $row['name'];
                $id          = $row['id'];
                $found_brand = new Brand($name, $id);
                array_push($found_brands, $found_brand);
            }
            return $found_brands;
        }

        // cruD
        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM brands *;");
            $GLOBALS['DB']->exec("DELETE FROM brands_stores *;");
        }

    }

?>
