<?php

require_once 'Calculator.php';

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $expectedResult = 3;

        $actualResult = Calculator::add(1, 2);

        $this->assertEquals($expectedResult, $actualResult, 'Addition test failed.');
    }

    public function testSubtract()
    {
        $expectedResult = 2;

        $actualResult = Calculator::subtract(5, 3);

        $this->assertEquals($expectedResult, $actualResult, 'Subtraction test failed.');
    }

    public function testMultiply()
    {
        $expectedResult = 8;

        $actualResult = Calculator::multiply(2, 4);

        $this->assertEquals($expectedResult, $actualResult, 'Multiplication test failed.');
    }

    public function testDivision()
    {
        $expectedResult = 3;

        $actualResult = Calculator::divide(9, 3);

        $this->assertEquals($expectedResult, $actualResult, 'Division test failed.');
    }

    public function testModulus()
    {
        $expectedResult = 0;

        $actualResult = Calculator::modulus(4, 2);

        $this->assertEquals($expectedResult, $actualResult, 'Modulus test failed.');
    }
} 