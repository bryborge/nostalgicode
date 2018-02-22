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
    class BrandTest extends PHPUnit_Framework_TestCase
    {

        // TEST DATABASE RESET
        protected function tearDown()
        {
            Brand::deleteAll();
            Store::deleteAll();
        }


        // BASIC TESTS
        function test_getId()
        {
            // Arrange
            $test_brand = new Brand("Asics", 1);

            // Act
            $result = $test_brand->getId();

            //Assert
            $this->assertEquals(1, $result);
        }

        function test_setId()
        {
            // Arrange
            $test_brand = new Brand("Asics", 1);

            // Act
            $test_brand->setId(13);
            $result = $test_brand->getId();

            // Assert
            $this->assertEquals(13, $result);

        }

        function test_getName()
        {
            // Arrange
            $test_brand = new Brand("Asics", 1);

            // Act
            $result = $test_brand->getName();

            // Assert
            $this->assertEquals("Asics", $result);
        }

        function test_setName()
        {
            // Arrange
            $test_brand = new Brand("Asics", 1);

            // Act
            $test_brand->setName("Nike");
            $result = $test_brand->getName();

            // Assert
            $this->assertEquals("Nike", $result);
        }


        // DATABASE TESTS
        function test_save()
        {
            // Arrange
            $test_brand = new Brand("Nike");

            // Act
            $test_brand->save();
            $result = Brand::getAll();

            // Assert
            $this->assertEquals([$test_brand], $result);
        }

        function test_getAll()
        {
            // Arrange
            $test_brand = new Brand("Asics");
            $test_brand->save();
            $test_brand2 = new Brand("Nike");
            $test_brand2->save();

            // Act
            $result = Brand::getAll();

            // Assert
            $this->assertEquals([$test_brand, $test_brand2], $result);
        }

        function test_deleteAll()
        {
            // Arrange
            $test_brand = new Brand("Asics");
            $test_brand->save();
            $test_brand2 = new Brand("Nike");
            $test_brand2->save();

            // Act
            Brand::deleteAll();
            $result = Brand::getAll();

            // Assert
            $this->assertEquals([], $result);
        }

        function test_findById()
        {
            // Arrange
            $test_brand = new Brand("Asics");
            $test_brand->save();
            $test_brand2 = new Brand("Nike");
            $test_brand2->save();

            // Act
            $result = Brand::findById($test_brand->getId());

            // Assert
            $this->assertEquals($test_brand, $result);
        }

        function test_findByName()
        {
            // Arrange
            $test_brand = new Brand("Asics");
            $test_brand->save();
            $test_brand2 = new Brand("Nike");
            $test_brand2->save();

            //Act
            $result = Brand::findByName("Ni");

            // Assert
            $this->assertEquals([$test_brand2], $result);
        }

        function test_getStores_one()
        {
            // Arrange
            $test_brand = new Brand("Asics");
            $test_brand->save();

            $test_store = new Store("Target");
            $test_store->save();
            $test_store2 = new Store("When the Shoe Fits");
            $test_store2->save();

            $test_brand->addStore($test_store);

            // Act
            $result = $test_brand->getStores();

            // Assert
            $this->assertEquals([$test_store], $result);
        }

        function test_getStores_many()
        {
            // Arrange
            $test_brand = new Brand("Asics");
            $test_brand->save();

            $test_store = new Store("Target");
            $test_store->save();
            $test_store2 = new Store("When the Shoe Fits");
            $test_store2->save();
            $test_store3 = new Store("REI");
            $test_store3->save();

            $test_brand->addStore($test_store);
            $test_brand->addStore($test_store2);
            $test_brand->addStore($test_store3);

            // Act
            $result = $test_brand->getStores();

            // Assert
            $this->assertEquals([$test_store, $test_store2, $test_store3], $result);
        }

        function test_update()
        {
            // Arrange
            $test_brand = new Brand("Nke");
            $test_brand->save();

            // Act
            $test_brand->update("Nike");
            $result = $test_brand->getName();

            // Assert
            $this->assertEquals("Nike", $result);
        }

        function test_delete()
        {
            // Arrange
            $test_brand = new Brand("Nike");
            $test_brand->save();

            // Act
            $test_brand->delete();
            $result = Brand::findById($test_brand->getId());

            // Assert
            $this->assertEquals(null, $result);
        }

    }

?>
