<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Stay.php';
    require_once 'src/Med.php';

    $DB = new PDO('pgsql:host=localhost;dbname=cms_test');

    Class MedTest extends PHPUnit_Framework_TestCase {

        protected function tearDown() {
           Stay::deleteAll();
           Med::deleteAll();
       }

        //---------------GETTERS-TESTS--------------------

        function test_getId() {
            // Arrange
            $med_name = "Aspirin";
            $dosage = "10 per day";
            $time_of_day = "06:06:06";
            $notes = "blah blah blah";
            $id = 1;
            $test_med = new Med($med_name, $dosage, $time_of_day, $notes, $id);

            //Act
            $result = $test_med->getId();

            //Assert
            $this->assertEquals(1, $result);
        }

        function test_getName() {
            // Arrange
            $med_name = "Aspirin";
            $dosage = "10 per day";
            $time_of_day = "06:06:06";
            $notes = "blah blah blah";
            $test_med = new Med($med_name, $dosage, $time_of_day, $notes);

            //Act
            $result = $test_med->getMedName();

            //Assert
            $this->assertEquals($med_name, $result);
        }

        //-----------------SETTERS-TESTS----------------------


        function test_setId() {
            // Arrange
            $med_name = "Aspirin";
            $dosage = "10 per day";
            $time_of_day = "06:06:06";
            $notes = "blah blah blah";
            $id = 1;
            $test_med = new Med($med_name, $dosage, $time_of_day, $notes, $id);

            //Act
            $test_med->setId(2);
            $result = $test_med->getId();

            //Assert
            $this->assertEquals(2, $result);
        }

        function test_setName() {
            // Arrange
            $med_name = "Aspirin";
            $dosage = "10 per day";
            $time_of_day = "06:06:06";
            $notes = "blah blah blah";
            $test_med = new Med($med_name, $dosage, $time_of_day, $notes);

            //Act
            $name2 = "Tylenol";
            $test_med->setMedName($name2);
            $result = $test_med->getMedName();

            //Assert
            $this->assertEquals($name2, $result);
        }


        //--------------------DB-TESTS------------------------

        function test_save() {
            // Arrange
            $med_name = "Aspirin";
            $dosage = "10 per day";
            $time_of_day = "06:06:06";
            $notes = "blah blah blah";
            $test_med = new Med($med_name, $dosage, $time_of_day, $notes);

            //Act
            $test_med->save();
            $result = Med::getAll();

            //Assert
            $this->assertEquals([$test_med], $result);
        }

        function test_delete() {
            // Arrange
            $med_name = "Aspirin";
            $dosage = "10 per day";
            $time_of_day = "06:06:06";
            $notes = "blah blah blah";
            $test_med = new Med($med_name, $dosage, $time_of_day, $notes);

            //Act
            $test_med->save();
            $test_med->delete();
            $result = Med::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_find() {
            // Arrange
            $med_name = "Aspirin";
            $dosage = "10 per day";
            $time_of_day = "06:06:06";
            $notes = "blah blah blah";
            $test_med = new Med($med_name, $dosage, $time_of_day, $notes);

            //Act
            $test_med->save();
            $id = $test_med->getId();
            $result = Med::find($id);

            //Assert
            $this->assertEquals($test_med, $result);
        }

        function test_search() {
            // Arrange
            $med_name = "Aspirin";
            $dosage = "10 per day";
            $time_of_day = "06:06:06";
            $notes = "blah blah blah";
            $test_med = new Med($med_name, $dosage, $time_of_day, $notes);
            $name2 = "Tylenol";
            $test_med2 = new Med($name2, $dosage, $time_of_day, $notes);

            //Act
            $test_med->save();
            $test_med2->save();
            $search_term = "Ty";
            $results = Med::search($search_term);

            //Assert
            $this->assertEquals($test_med2, $results[0]);
        }

        function test_updateMedName() {
            // Arrange
            $med_name = "Aspirin";
            $dosage = "10 per day";
            $time_of_day = "06:06:06";
            $notes = "blah blah blah";
            $test_med = new Med($med_name, $dosage, $time_of_day, $notes);
            $med_name2 = "Tylenol";

            //Act
            $test_med->save();
            $test_med->updateMedName($med_name2);
            $result = Med::find($test_med->getId());

            //Assert
            $this->assertEquals($med_name2, $result->getMedName());
        }

        function test_updateDosage() {
            // Arrange
            $med_name = "Aspirin";
            $dosage = "10 per day";
            $time_of_day = "06:06:06";
            $notes = "blah blah blah";
            $test_med = new Med($med_name, $dosage, $time_of_day, $notes);
            $dosage2 = "3 per day";

            //Act
            $test_med->save();
            $test_med->updateDosage($dosage2);
            $result = Med::find($test_med->getId());

            //Assert
            $this->assertEquals($dosage2, $result->getDosage());
        }

        function test_updateTimeOfDay() {
            // Arrange
            $med_name = "Aspirin";
            $dosage = "10 per day";
            $time_of_day = "06:06:06";
            $notes = "blah blah blah";
            $test_med = new Med($med_name, $dosage, $time_of_day, $notes);
            $time_of_day2 = "07:07:07";

            //Act
            $test_med->save();
            $test_med->updateTimeOfDay($time_of_day2);
            $result = Med::find($test_med->getId());

            //Assert
            $this->assertEquals($time_of_day2, $result->getTimeOfDay());
        }

        function test_updateNotes() {
            // Arrange
            $med_name = "Aspirin";
            $dosage = "10 per day";
            $time_of_day = "06:06:06";
            $notes = "blah blah blah";
            $test_med = new Med($med_name, $dosage, $time_of_day, $notes);
            $notes2 = "beeb beeb boop";

            //Act
            $test_med->save();
            $test_med->updateNotes($notes2);
            $result = Med::find($test_med->getId());

            //Assert
            $this->assertEquals($notes2, $result->getNotes());
        }

    }

?>
