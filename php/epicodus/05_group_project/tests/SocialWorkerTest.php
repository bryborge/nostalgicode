<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Stay.php';
    require_once 'src/SocialWorker.php';

    $DB = new PDO('pgsql:host=localhost;dbname=cms_test');

    Class SocialWorkerTest extends PHPUnit_Framework_TestCase {

        protected function tearDown() {
           Stay::deleteAll();
           SocialWorker::deleteAll();
       }

        //---------------GETTERS-TESTS--------------------

        function test_getId() {
            // Arrange
            $name = "Bob";
            $id = 1;
            $test_staff = new SocialWorker($name, $id);

            //Act
            $result = $test_staff->getId();

            //Assert
            $this->assertEquals(1, $result);
        }

        function test_getName() {
            // Arrange
            $name = "Bob";
            $test_staff = new SocialWorker($name);

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
            $test_staff = new SocialWorker($name, $id);

            //Act
            $test_staff->setId(2);
            $result = $test_staff->getId();

            //Assert
            $this->assertEquals(2, $result);
        }

        function test_setName() {
            // Arrange
            $name = "Bob";
            $test_staff = new SocialWorker($name);

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
            $test_staff = new SocialWorker($name);

            //Act
            $test_staff->save();
            $result = SocialWorker::getAll();

            //Assert
            $this->assertEquals([$test_staff], $result);
        }

        function test_delete() {
            // Arrange
            $name = "Bob";
            $test_staff = new SocialWorker($name);

            //Act
            $test_staff->save();
            $test_staff->delete();
            $result = SocialWorker::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_find() {
            // Arrange
            $name = "Bob";
            $test_staff = new SocialWorker($name);

            //Act
            $test_staff->save();
            $id = $test_staff->getId();
            $result = SocialWorker::find($id);

            //Assert
            $this->assertEquals($test_staff, $result);
        }

        function test_search() {
            // Arrange
            $name = "Bob";
            $test_staff = new SocialWorker($name);
            $name2 = "Bill";
            $test_staff2 = new SocialWorker($name2);

            //Act
            $test_staff->save();
            $test_staff2->save();
            $search_term = "Bil";
            $results = SocialWorker::search($search_term);

            //Assert
            $this->assertEquals($test_staff2, $results[0]);
        }

    }

?>
