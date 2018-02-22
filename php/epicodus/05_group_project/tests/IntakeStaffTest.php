<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Stay.php';
    require_once 'src/IntakeStaff.php';
    require_once 'src/Med.php';
    require_once 'src/SocialWorker.php';

    $DB = new PDO('pgsql:host=localhost;dbname=cms_test');

    Class IntakeStaffTest extends PHPUnit_Framework_TestCase {

        protected function tearDown() {
           Stay::deleteAll();
           IntakeStaff::deleteAll();
       }

        //---------------GETTERS-TESTS--------------------

        function test_getId() {
            // Arrange
            $name = "Bob";
            $id = 1;
            $test_staff = new IntakeStaff($name, $id);

            //Act
            $result = $test_staff->getId();

            //Assert
            $this->assertEquals(1, $result);
        }

        function test_getName() {
            // Arrange
            $name = "Bob";
            $test_staff = new IntakeStaff($name);

            //Act
            $result = $test_staff->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        //-----------------SETTERS-TESTS----------------------


        function test_setId() {
            // Arrange
            $name = "Bob";
            $id = 1;
            $test_staff = new IntakeStaff($name, $id);

            //Act
            $test_staff->setId(2);
            $result = $test_staff->getId();

            //Assert
            $this->assertEquals(2, $result);
        }

        function test_setName() {
            // Arrange
            $name = "Bob";
            $test_staff = new IntakeStaff($name);

            //Act
            $name2 = "Bill";
            $test_staff->setName($name2);
            $result = $test_staff->getName();

            //Assert
            $this->assertEquals($name2, $result);
        }


        //--------------------DB-TESTS------------------------

        function test_save() {
            // Arrange
            $name = "Bob";
            $test_staff = new IntakeStaff($name);

            //Act
            $test_staff->save();
            $result = IntakeStaff::getAll();

            //Assert
            $this->assertEquals([$test_staff], $result);
        }

        function test_delete() {
            // Arrange
            $name = "Bob";
            $test_staff = new IntakeStaff($name);

            //Act
            $test_staff->save();
            $test_staff->delete();
            $result = IntakeStaff::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_find() {
            // Arrange
            $name = "Bob";
            $test_staff = new IntakeStaff($name);

            //Act
            $test_staff->save();
            $id = $test_staff->getId();
            $result = IntakeStaff::find($id);

            //Assert
            $this->assertEquals($test_staff, $result);
        }

        function test_search() {
            // Arrange
            $name = "Bob";
            $test_staff = new IntakeStaff($name);
            $name2 = "Bill";
            $test_staff2 = new IntakeStaff($name2);

            //Act
            $test_staff->save();
            $test_staff2->save();
            $search_term = "Bil";
            $results = IntakeStaff::search($search_term);

            //Assert
            $this->assertEquals($test_staff2, $results[0]);
        }

    }

?>
