<?php

    class Contact
    {

        // Class Attributes
        public $name;
        private $phone;
        private $address;
        private $url_image;

        // Constructor
        function __construct($new_name, $new_phone, $new_address, $new_url_image)
        {
            $this->name         = $new_name;
            $this->phone        = $new_phone;
            $this->address      = $new_address;
            $this->url_image    = $new_url_image;
        }

        // Setters
        function setName($name)
        {
            $this->name = $new_name;
        }

        function setPhone($phone)
        {
            $this->phone = $new_phone;
        }

        function setAddress($address)
        {
            $this->address = $new_address;
        }

        function setImage($url_image)
        {
            $this->url_image = $new_url_image;
        }

        // Getters
        function getName()
        {
            return $this->name;
        }

        function getPhone()
        {
            return $this->phone;
        }

        function getAddress()
        {
            return $this->address;
        }

        function getImage()
        {
            return $this->url_image;
        }

        // Save the array in Session
        function save()
        {
            array_push($_SESSION['list_of_contacts'], $this);
        }

        // Return the contents or the array in Session
        static function getAll()
        {
            return $_SESSION['list_of_contacts'];
        }

        // Empty the contents of the array stored in Session
        static function removeAll()
        {
            $_SESSION['list_of_contacts'] = array();
        }

    }

?>
