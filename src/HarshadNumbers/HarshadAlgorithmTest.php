<?php

require_once 'HarshadAlgorithm.php';

class HarshadAlgorithmTest extends \PHPUnit_Framework_TestCase
{
    /** @var HarshadAlgorithm */
    protected $harshadClass;

    public function setUp()
    {
        $this->harshadClass = new HarshadAlgorithm();
    }

    /**
     * @param $number
     * @param $expectedResponse
     * @dataProvider respectsConditionProvider
     */
    public function testNumberRespectsCondition($number, $expectedResponse)
    {
        $actualResponse = $this->harshadClass->numberRespectsCondition($number);

        $this->assertInternalType('bool', $actualResponse);
        $this->assertEquals($expectedResponse, $actualResponse, 'Number was incorrectly identified as being divisible by the sum of its digits.');
    }

    public function respectsConditionProvider()
    {
        return [
            [-2, false],
            [-5, false],
            [0, false],
            [1, true],
            [2, true],
            [3, true],
            [4, true],
            [5, true],
            [6, true],
            [7, true],
            [8, true],
            [9, true],
            [10, true],
            [11, false],
            [12, true],
            [13, false],
            [14, false],
            [15, false],
            [16, false],
            [17, false],
            [18, true],
        ];
    }

    /**
     * @param $limit
     * @param $expectedResponse
     * @dataProvider harshadNumberProvider
     */
    public function testPrintHarshadNumbers($limit, $expectedResponse)
    {
        $actualResponse = $this->harshadClass->printHarshadNumbers($limit);

        $this->assertInternalType('array', $actualResponse, 'Harshad number sequence should be an array.');
        $this->assertEquals($expectedResponse, $actualResponse, 'The Harshad number sequence was not generated correctly.');
    }

    public function harshadNumberProvider()
    {
        return [
            [0, []],
            [3, [1, 2, 3]],
            [10, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]],
            [12, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12]],
            [18, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 18]],
            [50, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 18, 20, 21, 24, 27, 30, 36, 40, 42, 45, 48, 50]],
            [101, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 18, 20, 21, 24, 27, 30, 36, 40, 42, 45, 48, 50, 54, 60, 63, 70, 72, 80, 81, 84, 90, 100]],
            [200, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 18, 20, 21, 24, 27, 30, 36, 40, 42, 45, 48, 50, 54, 60, 63, 70, 72, 80, 81, 84, 90, 100, 102, 108, 110, 111, 112, 114, 117, 120, 126, 132, 133, 135, 140, 144, 150, 152, 153, 156, 162, 171, 180, 190, 192, 195, 198, 200]],
        ];
    }
} 