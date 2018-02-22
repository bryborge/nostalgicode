<?php

    /**
    * @backupGlobals disabled
    * $backupStaticAttribute disabled
    */

    require_once "src/Client.php";
    require_once "src/Flag.php";

    $DB = new PDO('pgsql:host=localhost;dbname=cms_test');

    class FlagTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Client::deleteAll();
            Flag::deleteAll();
        }

        function testGetFlagType()
        {
            //Arrange
            $flag_type = "Firesetting";
            $id = null;

            $test_flag = new Flag($flag_type, $id=null);

            //Act
            $result = $test_flag->getFlagType();

            //Assert
            $this->assertEquals($flag_type, $result);

        }

        function testSetFlagType()
        {
            //Arrange
            $flag_type = "Firesetting";
            $id = null;

            $test_flag = new Flag($flag_type, $id=null);

            //Act
            $test_flag->setFlagType("Self-harm");
            $result = $test_flag->getFlagType();

            //Assert
            $this->assertEquals("Self-harm", $result);
        }

        function testGetId()
        {
            //Arrange
            $flag_type = "Firesetting";
            $id = null;

            $test_flag = new Flag($flag_type, $id=null);

            //Act
            $result = $test_flag->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

        function testSetId()
        {
            //Arrange
            $flag_type = "Firesetting";
            $id = 1;
            $test_flag = new Flag($flag_type, $id = null);

            //Act
            $test_flag->setId(2);
            $result = $test_flag->getId();

            //Assert
            $this->assertEquals(2, $result);
        }

        function testSave()
        {
            //Arrange
            $flag_type = "Firesetting";
            $id = 1;
            $test_flag = new Flag($flag_type, $id);

            //Act
            $test_flag->save();

            //Assert
            $result = Flag::getAll();
        }

        function testSaveSetsId()
        {
            //Arrange
            $flag_type = "Firesetting";
            $id = 1;
            $test_flag = new Flag($flag_type, $id);

            //Act
            $test_flag->save();

            //Assert
            $this->assertEquals(true, is_numeric($test_flag->getId()));
        }

        function testGetAll()
        {
            //Arrange
            $flag_type = "Firesetting";
            $id = 1;
            $test_flag = new Flag($flag_type, $id);
            $test_flag->save();

            $flag_type2 = "Self-harm";
            $id2 = 2;
            $test_flag2 = new Flag($flag_type2, $id2);
            $test_flag2->save();

            //Act
            $result = Flag::getAll();

            //Assert
            $this->assertEquals([$test_flag, $test_flag2], $result);
        }

        function testDeleteAll()
        {
            //Arrange
            $flag_type = "Firesetting";
            $id = 1;
            $test_flag = new Flag($flag_type, $id);
            $test_flag->save();

            $flag_type2 = "Self-harm";
            $id2 = 2;
            $test_flag2 = new Flag($flag_type2, $id2);
            $test_flag2->save();

            //Act
            Flag::deleteAll();

            //Assert
            $result = Flag::getAll();
            $this->assertEquals([], $result);
        }

        function testDelete()
        {
            //Arrange
            $flag_type = "Firesetting";
            $id = 1;
            $test_flag = new Flag($flag_type, $id);
            $test_flag->save();

            $flag_type2 = "Self-harm";
            $id2 = 2;
            $test_flag2 = new Flag($flag_type2, $id2);
            $test_flag2->save();

            //Act
            $test_flag2->delete();
            $test_flags_all = Flag::getAll();

            //Assert
            $this->assertEquals([$test_flag], $test_flags_all);
        }

        // function testUpdateFlagType()
        // {
        //
        // }
        //

    }
?>
