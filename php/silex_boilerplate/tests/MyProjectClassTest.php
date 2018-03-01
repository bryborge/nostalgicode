<?php

/**
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */

require_once 'src/MyProjectClass.php';

class MyProjectClassTest extends PHPUnit_Framework_TestCase
{
    /**
     * [test_myFunction_firstTest description]
     * @return [type] [description]
     */
    function test_myFunction_firstTest()
    {
        //Arrange
        $test_MyProjectClass = new MyProjectClass;

        //Act
        $result = $test_MyProjectClass->myFunction();

        //Assert
        $this->assertEquals( /* expectation */, $result);
    }
}
