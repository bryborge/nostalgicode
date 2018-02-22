<?php

    /**
    * @backupGlobals disabled
    * $backupStaticAttribute disabled
    */

    require_once "src/Stylist.php";

    //In order to get this to work at all on my linux machine, I am required to add a password
    $DB = new PDO('pgsql:host=localhost; dbname=hair_salon_test; password=password');

    class StylistTest extends PHPUnit_Framework_TestCase
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

            //Act
            $result = $test_stylist->getId();

            //Assert
            $this->assertEquals(1, $result);
        }

        function test_getName()
        {
            //Arrange
            $id = null;
            $name = "Sally";
            $test_stylist = new Stylist($id, $name);

            //Act
            $result = $test_stylist->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_setId()
        {
            //Arrange
            $id = null;
            $name = "Jane";
            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals($test_stylist, $result[0]);
        }

        function test_setName()
        {
            //Arrange
            $id = null;
            $name = "Godric";
            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            //Act
            $test_stylist->setName($name);
            $result = $test_stylist->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_save()
        {
            //Arrange
            $id = null;
            $name = "Alexis";

            $id2 = null;
            $name2 = "Alex";

            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            $test_stylist2 = new Stylist($id2, $name2);
            $test_stylist2->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([$test_stylist, $test_stylist2], $result);
        }

        function test_getClients()
        {
            //Arrange
            $id = null;
            $name = "Bobbie";
            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            $stylist_id = $test_stylist->getId();

            $client_name = "Jeremy";
            $test_client = new Client($id, $client_name, $stylist_id);
            $test_client->save();

            $client_name2 = "Bryan";
            $test_client2 = new Client($id, $client_name2, $stylist_id);
            $test_client2->save();

            //Act
            $result = $test_stylist->getClients();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function test_getAll()
        {
            //Arrange
            $id = null;
            $name = "Gerald";

            $id2 = null;
            $name2 = "Melisandra";

            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            $test_stylist2 = new Stylist($id2, $name2);
            $test_stylist2->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([$test_stylist, $test_stylist2], $result);
        }

        function test_find()
        {
            //Arrange
            $id = null;
            $name = "Susan";
            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            $id2 = null;
            $name2 = "Jane";
            $test_stylist2 = new Stylist($id2, $name2);
            $test_stylist2->save();

            //Act
            $result = Stylist::find($test_stylist->getId());

            //Assert
            $this->assertEquals($test_stylist, $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $id = null;
            $name = "Geoff";
            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            $client_name = "Jill";
            $category_id = $test_stylist->getId();
            $test_client = new Client($id, $client_name, $category_id);
            $test_client->save();

            $client_name2 = "Jane";
            $test_client2 = new Client($id, $client_name2, $category_id);
            $test_client2->save();

            //Act
            Client::deleteAll();

            //Assert
            $result = Client::getAll();
            $this->assertEquals([], $result);
        }

        function test_update()
        {
            //Arrange
            $id = 1;
            $name = "Jane";
            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            $new_stylist_name = "Jake";

            //Act
            $test_stylist->update($new_stylist_name);

            //Assert
            $this->assertEquals("Jake", $test_stylist->getName());
        }

        function test_delete()
        {
            //Arrange
            $id = null;
            $name = "Sally";
            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            $name2 = "Billy";
            $test_stylist2 = new Stylist($id, $name2);
            $test_stylist2->save();

            //Act
            $test_stylist->delete();

            //Assert
            $this->assertEquals([$test_stylist2], Stylist::getAll());
        }

        function test_delete_clients()
        {
            //Arrange
            $id = null;
            $name = "Sally";
            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            $client_name = "Jefferson";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $client_name, $stylist_id);
            $test_client->save();

            //Act
            $test_stylist->delete();

            //Assert
            $this->assertEquals([], Client::getAll());
        }

    }

?>
