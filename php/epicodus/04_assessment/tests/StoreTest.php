<?php

    /**
    *   @backupGlobals disabled
    *   @backupStaticAttributes disabled
    */

    // CLASSES TO TEST
    require_once "src/Brand.php";
    require_once "src/Store.php";

    // TEST DATABASE
    $DB = new PDO("pgsql:host=localhost; dbname=shoes_test; password=password");

    // CLASS DECLARATION
    class StoreTest extends PHPUnit_Framework_TestCase
    {

        // TEST DATABASE RESET
        protected function tearDown()
        {
            Store::deleteAll();
            Brand::deleteAll();
        }


        // BASIC TESTS
        function test_getId()
        {
            // Arrange
            $test_store = new Store("Target", 1);

            // Act
            $result = $test_store->getId();

            //Assert
            $this->assertEquals(1, $result);
        }

        function test_setId()
        {
            // Arrange
            $test_store = new Store("Target", 1);

            // Act
            $test_store->setId(13);
            $result = $test_store->getId();

            // Assert
            $this->assertEquals(13, $result);

        }

        function test_getName()
        {
            // Arrange
            $test_store = new Store("Target", 1);

            // Act
            $result = $test_store->getName();

            // Assert
            $this->assertEquals("Target", $result);
        }

        function test_setName()
        {
            // Arrange
            $test_store = new Store("Target", 1);

            // Act
            $test_store->setName("When the Shoe Fits");
            $result = $test_store->getName();

            // Assert
            $this->assertEquals("When the Shoe Fits", $result);
        }


        // DATABASE TESTS
        function test_save()
        {
            // Arrange
            $test_store = new Store("When the Shoe Fits");

            // Act
            $test_store->save();
            $result = Store::getAll();

            // Assert
            $this->assertEquals([$test_store], $result);
        }

        function test_getAll()
        {
            // Arrange
            $test_store = new Store("Target");
            $test_store->save();
            $test_store2 = new Store("When the Shoe Fits");
            $test_store2->save();

            // Act
            $result = Store::getAll();

            // Assert
            $this->assertEquals([$test_store, $test_store2], $result);
        }

        function test_deleteAll()
        {
            // Arrange
            $test_store = new Store("Target");
            $test_store->save();
            $test_store2 = new Store("When the Shoe Fits");
            $test_store2->save();

            // Act
            Store::deleteAll();
            $result = Store::getAll();

            // Assert
            $this->assertEquals([], $result);
        }

        function test_findById()
        {
            // Arrange
            $test_store = new Store("Target");
            $test_store->save();
            $test_store2 = new Store("When the Shoe Fits");
            $test_store2->save();

            // Act
            $result = Store::findById($test_store->getId());

            // Assert
            $this->assertEquals($test_store, $result);
        }

        function test_findByName()
        {
            // Arrange
            $test_store = new Store("Target");
            $test_store->save();
            $test_store2 = new Store("When the Shoe Fits");
            $test_store2->save();

            //Act
            $result = Store::findByName("When the");

            // Assert
            $this->assertEquals([$test_store2], $result);
        }

        function test_getBrands_one()
        {
            // Arrange
            $test_store = new Store("Target");
            $test_store->save();

            $test_brand = new Brand("Asics");
            $test_brand->save();
            $test_brand2 = new Brand("Nike");
            $test_brand2->save();

            $test_store->addBrand($test_brand);

            // Act
            $result = $test_store->getBrands();

            // Assert
            $this->assertEquals([$test_brand], $result);
        }

        function test_getBrands_many()
        {
            // Arrange
            $test_store = new Store("Target");
            $test_store->save();

            $test_brand = new Brand("Asics");
            $test_brand->save();
            $test_brand2 = new Brand("Nike");
            $test_brand2->save();
            $test_brand3 = new Brand("Converse");
            $test_brand3->save();

            $test_store->addBrand($test_brand);
            $test_store->addBrand($test_brand2);
            $test_store->addBrand($test_brand3);

            // Act
            $result = $test_store->getBrands();

            // Assert
            $this->assertEquals([$test_brand, $test_brand2, $test_brand3], $result);
        }

        function test_update()
        {
            // Arrange
            $test_store = new Store("When the Shoe Fits");
            $test_store->save();

            // Act
            $test_store->update("Target");
            $result = $test_store->getName();

            // Assert
            $this->assertEquals("Target", $result);
        }

        function test_delete()
        {
            // Arrange
            $test_store = new Store("Target");
            $test_store->save();

            // Act
            $test_store->delete();
            $result = Store::findById($test_store->getId());

            // Assert
            $this->assertEquals(null, $result);
        }

    }

?>
