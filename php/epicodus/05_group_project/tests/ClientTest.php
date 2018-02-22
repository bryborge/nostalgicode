<?php

    /**
    * @backupGlobals disabled
    * $backupStaticAttribute disabled
    */

    require_once "src/Client.php";
    require_once "src/Flag.php";

    $DB = new PDO('pgsql:host=localhost;dbname=cms_test');

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Client::deleteAll();
            Flag::deleteAll();
        }

        function testGetLastName()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = null;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null);

            //Act
            $result = $test_client->getLastName();
            //Assert
            $this->assertEquals($last_name, $result);
        }

        function testSetLastName()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = null;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null);

            //Act
            $test_client->setLastName("Fuller");
            $result = $test_client->getLastName();

            //Assert
            $this->assertEquals("Fuller", $result);
        }

        function testGetFirstName()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = null;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null);

            //Act
            $result = $test_client->getFirstName();
            //Assert
            $this->assertEquals($first_name, $result);
        }

        function testSetFirstName()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = null;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null);

            //Act
            $test_client->setFirstName("Buckminster");
            $result = $test_client->getFirstName();

            //Assert
            $this->assertEquals("Buckminster", $result);
        }

        function testGetAlias()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = null;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null);

            //Act
            $result = $test_client->getAlias();

            //Assert
            $this->assertEquals($alias, $result);
        }

        function testSetAlias()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = null;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null);

            //Act
            $test_client->setAlias("Aqua");
            $result = $test_client->getAlias();

            //Assert
            $this->assertEquals("Aqua", $result);
        }

        function testGetDob()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = null;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null);

            //Act
            $result = $test_client->getDob();

            //Assert
            $this->assertEquals($dob, $result);
        }

        function testSetDob()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = null;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null);

            //Act
            $test_client->setDob("02/02/1985");
            $result = $test_client->getDob();

            //Assert
            $this->assertEquals("02/02/1985", $result);
        }

        function testGetGender()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = null;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null);

            //Act
            $result = $test_client->getGender();

            //Assert
            $this->assertEquals($gender, $result);
        }

        function testSetGender()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = null;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null);

            //Act
            $test_client->setGender("Genderqueer");
            $result = $test_client->getGender();

            //Assert
            $this->assertEquals("Genderqueer", $result);
        }

        function testGetRace()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = null;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null);

            //Act
            $result = $test_client->getRace();

            //Assert
            $this->assertEquals($race, $result);
        }

        function testSetRace()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = null;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null);

            //Act
            $test_client->setRace("African American");
            $result = $test_client->getRace();

            //Assert
            $this->assertEquals("African American", $result);
        }

        function testGetEthnicity()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = null;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null);

            //Act
            $result = $test_client->getEthnicity();

            //Assert
            $this->assertEquals($ethnicity, $result);
        }

        function testSetEthnicity()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = null;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null);

            //Act
            $test_client->setEthnicity("Afro-European");
            $result = $test_client->getEthnicity();

            //Assert
            $this->assertEquals("Afro-European", $result);
        }

        function testGetNotes()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = null;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null);

            //Act
            $result = $test_client->getNotes();

            //Assert
            $this->assertEquals($notes, $result);
        }

        function testSetNotes()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = null;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null);

            //Act
            $test_client->setNotes("Important stuff to know about Netta.");
            $result = $test_client->getNotes();

            //Assert
            $this->assertEquals("Important stuff to know about Netta.", $result);
        }

        function testGetAdmitStatus()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = null;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null);

            //Act
            $result = $test_client->getAdmitStatus();

            //Assert
            $this->assertEquals($admit_status, $result);
        }

        function testSetAdmitStatus()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = null;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null);

            //Act
            $test_client->setAdmitStatus("Prior approval");
            $result = $test_client->getAdmitStatus();

            //Assert
            $this->assertEquals("Prior approval", $result);
        }

        function testGetLastAssessed()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = null;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null);

            //Act
            $result = $test_client->getLastAssessed();

            //Assert
            $this->assertEquals($last_assessed, $result);
        }

        function testSetLastAssessed()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = null;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null);

            //Act
            $test_client->setLastAssessed("01/31/2014");
            $result = $test_client->getLastAssessed();

            //Assert
            $this->assertEquals("01/31/2014", $result);
        }

        function testGetId()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = null;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null);

            //Act
            $result = $test_client->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

        function testSetId()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = 1;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null);

            //Act
            $test_client->setId(2);
            $result = $test_client->getId();

            //Assert
            $this->assertEquals(2, $result);
        }

        function testSave()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = 1;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id);

            //Act
            $test_client->save();

            //Assert
            $result = Client::getAll();
            $this->assertEquals($test_client, $result[0]);
        }

        function testGetAll()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = 1;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id = null);
            $test_client->save();

            $last_name2 = "Fuller";
            $first_name2 = "Buckminster";
            $alias2 = "Bucky";
            $dob2 = "1940-01-01";
            $gender2 = "Male";
            $race2 = "White";
            $ethnicity2 = "Anglo-European";
            $notes2 = "Notes about Buckminster go here.";
            $admit_status2 = "Approved";
            $last_assessed2 = "2015-05-20";
            $id2 = 2;
            $test_client2 = new Client($last_name2, $first_name2, $alias2, $dob2, $gender2, $race2, $ethnicity2, $notes2, $admit_status2, $last_assessed2, $id2);
            $test_client2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function testDeleteAll()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = 1;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id);
            $test_client->save();

            $last_name2 = "Fuller";
            $first_name2 = "Buckminster";
            $alias2 = "Bucky";
            $dob2 = "1940-01-01";
            $gender2 = "Male";
            $race2 = "White";
            $ethnicity2 = "Anglo-European";
            $notes2 = "Notes about Buckminster go here.";
            $admit_status2 = "Approved";
            $last_assessed2 = "2015-05-20";
            $id2 = 2;
            $test_client2 = new Client($last_name2, $first_name2, $alias2, $dob2, $gender2, $race2, $ethnicity2, $notes2, $admit_status2, $last_assessed2, $id2);
            $test_client2->save();

            //Act
            Client::deleteAll();

            //Assert
            $result = Client::getAll();
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = 1;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id);
            $test_client->save();

            $test_id = $test_client->getId();

            $last_name2 = "Fuller";
            $first_name2 = "Buckminster";
            $alias2 = "Bucky";
            $dob2 = "1940-01-01";
            $gender2 = "Male";
            $race2 = "White";
            $ethnicity2 = "Anglo-European";
            $notes2 = "Notes about Buckminster go here.";
            $admit_status2 = "Approved";
            $last_assessed2 = "2015-05-20";
            $id2 = 2;
            $test_client2 = new Client($last_name2, $first_name2, $alias2, $dob2, $gender2, $race2, $ethnicity2, $notes2, $admit_status2, $last_assessed2, $id2);
            $test_client2->save();

            //Act
            $search_id = Client::find($test_id);

            //Assert
            $this->assertEquals($test_client, $search_id);
        }

        function testDelete()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = 1;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id);
            $test_client->save();

            $last_name2 = "Fuller";
            $first_name2 = "Buckminster";
            $alias2 = "Bucky";
            $dob2 = "1940-01-01";
            $gender2 = "Male";
            $race2 = "White";
            $ethnicity2 = "Anglo-European";
            $notes2 = "Notes about Buckminster go here.";
            $admit_status2 = "Approved";
            $last_assessed2 = "2015-05-20";
            $id2 = 2;
            $test_client2 = new Client($last_name2, $first_name2, $alias2, $dob2, $gender2, $race2, $ethnicity2, $notes2, $admit_status2, $last_assessed2, $id2);
            $test_client2->save();

            //Act
            $test_client2->delete();
            $test_clients = Client::getAll();
            // var_dump($test_clients);

            //Assert
            $this->assertEquals([$test_client], $test_clients);
        }

        // function testUpdateName()
        // {
        //     //Arrange
        //     $last_name = "Jones";
        //     $first_name = "Aquanetta";
        //     $alias = "Netta";
        //     $dob = "1984-01-01";
        //     $gender = "MtF";
        //     $race = "Latina";
        //     $ethnicity = "Hispanic";
        //     $notes = "Notes about Aquanetta go here.";
        //     $admit_status = "Approved";
        //     $last_assessed = "2015-05-31";
        //     $id = 1;
        //     $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id);
        //     $test_client->save();
        //
        //     $new_last_name = "Fuller";
        //     $new_first_name = "Buckminster";
        //
        //     //Act
        //     $test_client->updateName($new_last_name, $new_first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id);
        //
        //     //Assert
        //     $this->assertEquals("Fuller", $test_client->getLastName());
        //
        // }

        function test_addFlag()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = 1;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id);
            $test_client->save();

            $flag_type = "Firesetting";
            $id2 = 1;
            $test_flag = new Flag($flag_type, $id2);
            $test_flag->save();

            //Act
            $test_client->addFlag($test_flag);

            //Assert
            $this->assertEquals($test_client->getFlags(), [$test_flag]);
        }

        function test_removeFlag()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed);
            $test_client->save();

            $flag_type = "Firesetting";
            $test_flag = new Flag($flag_type);
            $test_flag->save();

            $flag_type2 = "Assault";
            $test_flag2 = new Flag($flag_type2);
            $test_flag2->save();

            //Act
            $test_client->addFlag($test_flag);
            $test_client->addFlag($test_flag2);
            $test_client->removeFlag($test_flag);
            $result = $test_client->getFlags();

            //Assert
            $this->assertEquals([$test_flag2], $result);
        }

        function test_getFlags()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = 1;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id);
            $test_client->save();

            $flag_type = "Firesetting";
            $id2 = 1;
            $test_flag = new Flag($flag_type, $id2);
            $test_flag->save();

            $flag_type2 = "Self-harm";
            $id3 = 2;
            $test_flag2 = new Flag($flag_type2, $id3);
            $test_flag2->save();

            //Act
            $test_client->addFlag($test_flag);
            $test_client->addFlag($test_flag2);

            //Assert
            $this->assertEquals($test_client->getFlags(), [$test_flag, $test_flag2]);
        }

        function test_search()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed);
            $test_client->save();

            //Act
            $result = Client::search("Jones");

            //Assert
            $this->assertEquals([$test_client], $result);
        }

        function test_updateLastName()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed);
            $test_client->save();

            //Act
            $new_last_name = "Smith";
            $test_client->updateLastName($new_last_name);
            $result = Client::find($test_client->getId());

            //Assert
            $this->assertEquals($new_last_name, $result->getLastName());
        }

        function test_updateFirstName()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed);
            $test_client->save();

            //Act
            $new_first_name = "Smith";
            $test_client->updateFirstName($new_first_name);
            $result = Client::find($test_client->getId());

            //Assert
            $this->assertEquals($new_first_name, $result->getFirstName());
        }

        function test_updateAlias()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed);
            $test_client->save();

            //Act
            $new_alias = "Smith";
            $test_client->updateAlias($new_alias);
            $result = Client::find($test_client->getId());

            //Assert
            $this->assertEquals($new_alias, $result->getAlias());
        }

        function test_updateDob()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed);
            $test_client->save();

            //Act
            $new_dob = "1984-01-02";
            $test_client->updateDob($new_dob);
            $result = Client::find($test_client->getId());

            //Assert
            $this->assertEquals($new_dob, $result->getDob());
        }

        function test_updateGender()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed);
            $test_client->save();

            //Act
            $new_gender = "biscuit";
            $test_client->updateGender($new_gender);
            $result = Client::find($test_client->getId());

            //Assert
            $this->assertEquals($new_gender, $result->getGender());
        }

        function test_updateRace()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed);
            $test_client->save();

            //Act
            $new_race = "biscuit";
            $test_client->updateRace($new_race);
            $result = Client::find($test_client->getId());

            //Assert
            $this->assertEquals($new_race, $result->getRace());
        }

        function test_updateEthnicity()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed);
            $test_client->save();

            //Act
            $new_ethnicity = "biscuit";
            $test_client->updateEthnicity($new_ethnicity);
            $result = Client::find($test_client->getId());

            //Assert
            $this->assertEquals($new_ethnicity, $result->getEthnicity());
        }

        function test_updateNotes()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed);
            $test_client->save();

            //Act
            $new_notes = "biscuit";
            $test_client->updateNotes($new_notes);
            $result = Client::find($test_client->getId());

            //Assert
            $this->assertEquals($new_notes, $result->getNotes());
        }

        function test_updateAdmitStatus()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed);
            $test_client->save();

            //Act
            $new_admit_status = "biscuit";
            $test_client->updateAdmitStatus($new_admit_status);
            $result = Client::find($test_client->getId());

            //Assert
            $this->assertEquals($new_admit_status, $result->getAdmitStatus());
        }

        function test_updateLastAssessed()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed);
            $test_client->save();

            //Act
            $new_last_assessed = "2015-06-20";
            $test_client->updateLastAssessed($new_last_assessed);
            $result = Client::find($test_client->getId());

            //Assert
            $this->assertEquals($new_last_assessed, $result->getLastAssessed());
        }

        function test_addStay() {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed);
            $test_client->save();

            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);
            $test_stay->save();

            //Act
            $test_client->addStay($test_stay);
            $result = $test_client->getStays();

            //Assert
            $this->assertEquals([$test_stay], $result);
        }

        function test_removeStay() {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed);
            $test_client->save();

            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);
            $test_stay->save();

            $intake_date_time2 = "2014-01-08 04:05:06";
            $exit_date_time2 = "2015-01-08 04:05:06";
            $run_risk2 = 0;
            $exited_by2 = "Father";
            $lice2 = 1;
            $destination2 = 'Hospital';
            $test_stay2 = new Stay($intake_date_time2, $exit_date_time2, $run_risk2, $exited_by2, $lice2, $destination2);
            $test_stay2->save();

            //Act
            $test_client->addStay($test_stay);
            $test_client->addStay($test_stay2);
            $test_client->removeStay($test_stay);
            $result = $test_client->getStays();

            //Assert
            $this->assertEquals([$test_stay2], $result);
        }

        function test_addAllergy()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = 1;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id);
            $test_client->save();

            $allergy_type = "Pollen";
            $test_allergy = new Allergy($allergy_type);
            $test_allergy->save();

            //Act
            $test_client->addAllergy($test_allergy);
            $result = $test_client->getAllergies();

            //Assert
            $this->assertEquals([$test_allergy], $result);
        }

        function test_removeAllergy()
        {
            //Arrange
            $last_name = "Jones";
            $first_name = "Aquanetta";
            $alias = "Netta";
            $dob = "1984-01-01";
            $gender = "MtF";
            $race = "Latina";
            $ethnicity = "Hispanic";
            $notes = "Notes about Aquanetta go here.";
            $admit_status = "Approved";
            $last_assessed = "2015-05-31";
            $id = 1;
            $test_client = new Client($last_name, $first_name, $alias, $dob, $gender, $race, $ethnicity, $notes, $admit_status, $last_assessed, $id);
            $test_client->save();

            $allergy_type = "Pollen";
            $test_allergy = new Allergy($allergy_type);
            $test_allergy->save();

            $allergy_type2 = "Nickelback";
            $test_allergy2 = new Allergy($allergy_type2);
            $test_allergy2->save();

            //Act
            $test_client->addAllergy($test_allergy);
            $test_client->addAllergy($test_allergy2);
            $test_client->removeAllergy($test_allergy);
            $result = $test_client->getAllergies();

            //Assert
            $this->assertEquals([$test_allergy2], $result);
        }
    }

?>
