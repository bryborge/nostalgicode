<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Allergy.php';
    require_once 'src/Client.php';

    $DB = new PDO('pgsql:host=localhost;dbname=cms_test');

    Class AllergyTest extends PHPUnit_Framework_TestCase {

        protected function tearDown() {
           Allergy::deleteAll();
           Client::deleteAll();
       }

        function test_getAllergyType() {
            // Arrange
            $allergy_type = "Pollen";
            $test_allergy = new Allergy($allergy_type);

            // Act
            $result = $test_allergy->getAllergyType();

            // Assert
            $this->assertEquals($allergy_type, $result);
        }

        function test_getId() {
            // Arrange
            $allergy_type = "Pollen";
            $test_allergy = new Allergy($allergy_type, 1);

            // Act
            $result = $test_allergy->getId();

            // Assert
            $this->assertEquals(1, $result);
        }

        function test_setAllergyType() {
            // Arrange
            $allergy_type = "Pollen";
            $test_allergy = new Allergy($allergy_type);

            // Act
            $allergy_type2 = "Nickelback";
            $test_allergy->setAllergyType($allergy_type2);
            $result = $test_allergy->getAllergyType();

            // Assert
            $this->assertEquals($allergy_type2, $result);
        }

        function test_setId() {
            // Arrange
            $allergy_type = "Pollen";
            $test_allergy = new Allergy($allergy_type, 1);

            // Act
            $id2 = 2;
            $test_allergy->setId($id2);
            $result = $test_allergy->getId();

            // Assert
            $this->assertEquals($id2, $result);
        }

        function test_save() {
            // Arrange
            $allergy_type = "Pollen";
            $test_allergy = new Allergy($allergy_type);

            // Act
            $test_allergy->save();
            $result = Allergy::getAll();

            // Assert
            $this->assertEquals([$test_allergy], $result);
        }

        function test_delete() {
            // Arrange
            $allergy_type = "Pollen";
            $test_allergy = new Allergy($allergy_type);

            // Act
            $test_allergy->save();
            $test_allergy->delete();
            $result = Allergy::getAll();

            // Assert
            $this->assertEquals([], $result);
        }

        function test_find() {
            // Arrange
            $allergy_type = "Pollen";
            $test_allergy = new Allergy($allergy_type);

            // Act
            $test_allergy->save();
            $result = Allergy::find($test_allergy->getId());

            // Assert
            $this->assertEquals($test_allergy, $result);
        }

        function test_update() {
            // Arrange
            $allergy_type = "Pollen";
            $test_allergy = new Allergy($allergy_type);

            // Act
            $test_allergy->save();
            $allergy_type2 = "Nickelback";
            $test_allergy->update($allergy_type2);
            $result = $test_allergy->getAllergyType();

            // Assert
            $this->assertEquals($allergy_type2, $result);
        }

    }



?>
