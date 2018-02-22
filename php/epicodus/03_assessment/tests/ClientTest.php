<?php

    /**
    * @backupGlobals disabled
    * $backupStaticAttribute disabled
    */

    require_once "src/Client.php";
    require_once "src/Stylist.php";

    // In order to get this to work at all on my linux machine, I am required to add a password
    $DB = new PDO('pgsql:host=localhost; dbname=hair_salon_test; password=password');

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stylist::deleteAll();
            Client::deleteAll();
        }

        function test_getId()
        {
            //Arrange
            $id = 1;
            $name = "Susan";
            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            $client_name = "Danny";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $client_name, $stylist_id);
            $test_client->save();

            //Act
            $result = $test_client->getId();

            //Assert
            $this->assertEquals(TRUE, is_numeric($result));
        }

        function test_getName()
        {
            //Arrange
            $id = null;
            $name = "Susan";
            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            $client_name = "Danny";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $client_name, $stylist_id);
            $test_client->save();

            //Act
            $result = $test_client->getName();

            //Assert
            $this->assertEquals($client_name, $result);
        }

        function test_getCategoryId()
        {
            //Arrange
            $id = null;
            $name = "Susan";
            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            $client_name = "Danny";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $client_name, $stylist_id);
            $test_client->save();

            //Act
            $result = $test_client->getStylistId();

            //Assert
            $this->assertEquals(TRUE, is_numeric($result));
        }

        function test_setId()
        {
            //Arrange
            $id = null;
            $name = "Susan";
            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            $client_name = "Danny";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $client_name, $stylist_id);
            $test_client->save();

            //Act
            $test_client->setId(2);
            $result = $test_client->getId();

            //Assert
            $this->assertEquals(2, $result);
        }

        function test_setName()
        {
            //Arrange
            $id = null;
            $name = "Susan";
            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            $client_name = "Danny";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $client_name, $stylist_id);
            $test_client->save();

            //Act
            $test_client->setName($client_name);
            $result = $test_client->getName();

            //Assert
            $this->assertEquals($client_name, $result);
        }

        function test_setCategoryId()
        {
            //Arrange
            $id = null;
            $name = "Susan";
            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            $client_name = "Danny";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $client_name, $stylist_id);
            $test_client->save();

            //Act
            $test_client->setStylistId(2);
            $result = $test_client->getStylistId();

            //Assert
            $this->assertEquals(2, $result);
        }

        function test_save()
        {
            //Arrange
            $id = null;
            $name = "Susan";
            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            $client_name = "Danny";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $client_name, $stylist_id);

            //Act
            $test_client->save();
            $result = $test_client::getAll();

            //Assert
            $this->assertEquals($test_client, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $id = null;
            $name = "Johnny";
            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            $client_name = "Gerald";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $client_name, $stylist_id);
            $test_client->save();

            $client_name2 = "Melisandra";
            $test_client2 = new Client($id, $client_name2, $stylist_id);
            $test_client2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function test_find()
        {
            //Arrange
            $id = null;
            $name = "Johnny";
            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            $client_name = "Gerald";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $client_name, $stylist_id);
            $test_client->save();

            $client_name2 = "Melisandra";
            $test_client2 = new Client($id, $client_name2, $stylist_id);
            $test_client2->save();

            //Act
            $result = Client::find($test_client->getId());

            //Assert
            $this->assertEquals($test_client, $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $id = null;
            $name = "Susan";
            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            $client_name = "Danny";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $client_name, $stylist_id);
            $test_client->save();

            $client_name2 = "Brianna";
            $test_client2 = new Client($id, $client_name2, $stylist_id);
            $test_client2->save();

            //Act
            Client::deleteAll();
            $result = Client::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_update()
        {
            //Arrange
            $id = 1;
            $name = "Susan";
            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            $client_name = "Bobbie";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $client_name, $stylist_id);
            $test_client->save();

            $new_client_name = "Jeff";

            //Act
            $test_client->update($new_client_name);

            //Assert
            $this->assertEquals("Jeff", $test_client->getName());
        }

    }

?>
