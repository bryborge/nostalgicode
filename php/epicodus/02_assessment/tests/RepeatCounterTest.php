<?php

    require_once "src/RepeatCounter.php";

    class RepeatCounterTest extends PHPUnit_Framework_TestCase
    {
        function test_RepeatCounter_singleWord_singleString_same()
        {
            // Arrange
            $test_RepeatCounter = new RepeatCounter;
            $word = "a";
            $string = "a";

            // Act
            $result = $test_RepeatCounter->countRepeats($word, $string);

            // Assert
            $this->assertEquals(1, $result);
        }

        function test_RepeatCounter_singleWord_singleString_diff()
        {
            // Arrange
            $test_RepeatCounter = new RepeatCounter;
            $word = "a";
            $string = "i";

            // Act
            $result = $test_RepeatCounter->countRepeats($word, $string);

            // Assert
            $this->assertEquals(0, $result);
        }

        function test_RepeatCounter_singleWord_emptyStr()
        {
            // Arrange
            $test_RepeatCounter = new RepeatCounter;
            $word = "a";
            $string = "";

            // Act
            $result = $test_RepeatCounter->countRepeats($word, $string);

            // Assert
            $this->assertEquals(0, $result);
        }

        function test_RepeatCounter_singleWord_multiString_two()
        {
            // Arrange
            $test_RepeatCounter = new RepeatCounter;
            $word = "a";
            $string = "a leopard is not a pet";

            // Act
            $result = $test_RepeatCounter->countRepeats($word, $string);

            // Assert
            $this->assertEquals(2, $result);
        }

        function test_RepeatCounter_singleWord_multiString_diff()
        {
            // Arrange
            $test_RepeatCounter = new RepeatCounter;
            $word = "i";
            $string = "douglas adams is a great author";

            // Act
            $result = $test_RepeatCounter->countRepeats($word, $string);

            // Assert
            $this->assertEquals(0, $result);
        }

        function test_RepeatCounter_multiLetterWord_singleWordString_same()
        {
            // Arrange
            $test_RepeatCounter = new RepeatCounter;
            $word = "and";
            $string = "and";

            // Act
            $result = $test_RepeatCounter->countRepeats($word, $string);

            // Assert
            $this->assertEquals(1, $result);
        }

        function test_RepeatCounter_multiLetterWord_multiWordString_diff()
        {
            // Arrange
            $test_RepeatCounter = new RepeatCounter;
            $word = "and";
            $string = "these are not the droids you are looking for";

            // Act
            $result = $test_RepeatCounter->countRepeats($word, $string);

            // Assert
            $this->assertEquals(0, $result);
        }

        function test_RepeatCounter_multiLetterWord_multiWordString_three()
        {
            // Arrange
            $test_RepeatCounter = new RepeatCounter;
            $word = "coffee";
            $string = "my coffee addiction has gotten out of control since i started programming but what coffee shop sells the best coffee in town?";

            // Act
            $result = $test_RepeatCounter->countRepeats($word, $string);

            // Assert
            $this->assertEquals(3, $result);
        }

        function test_RepeatCounter_multiLetterWord_multiWordString_sameCaps()
        {
            // Arrange
            $test_RepeatCounter = new RepeatCounter;
            $word = "Hello";
            $string = "Hello world How do you say hello in German?";

            // Act
            $result = $test_RepeatCounter->countRepeats($word, $string);

            // Assert
            $this->assertEquals(2, $result);
        }

        function test_RepeatCounter_multiLetterWord_multiWordString_samePunc()
        {
            // Arrange
            $test_RepeatCounter = new RepeatCounter;
            $word = "friend";
            $string = "Hi friend. What are you doing today?";

            // Act
            $result = $test_RepeatCounter->countRepeats($word, $string);

            // Assert
            $this->assertEquals(1, $result);
        }

    }

?>
