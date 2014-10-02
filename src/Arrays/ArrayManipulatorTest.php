<?php

require_once 'ArrayManipulator.php';

class ArrayManipulatorTest extends \PHPUnit_Framework_TestCase
{
    /** @var array */
    protected $defaultValidData = [1, 2, 3];

    /** @var ArrayManipulator */
    protected $arrayManipulatorClass;

    public function setUp()
    {
        $this->arrayManipulatorClass = new ArrayManipulator();
    }

    /**
     * @param $data
     * @param $expectedResponse
     * @dataProvider elementsProvider
     */
    public function testLoad($data, $expectedResponse)
    {
        $actualResponse = $this->arrayManipulatorClass->load($data);

        $this->assertInternalType('array', $actualResponse);
        $this->assertEquals($expectedResponse, $actualResponse, 'Invalid data has been loaded into the manipulator.');
    }

    public function elementsProvider()
    {
        return [
            [[1, 2, 3], [1, 2, 3]],
            [[-1, 2, 3], [2, 3]],
            [[1.5, -2.2, 3], [3]],
            [[-1, 2.2, 3.3], []],
            [[], []],
        ];
    }

    /**
     * @param $element
     * @param $expectedResponse
     * @dataProvider singleElementProvider
     */
    public function testAddElement($element, $expectedResponse)
    {
        $this->arrayManipulatorClass->load($this->defaultValidData);
        $actualResponse = $this->arrayManipulatorClass->addElement($element);

        $this->assertInternalType('array', $actualResponse);
        $this->assertEquals($expectedResponse, $actualResponse, 'Adding an element has not generated the expected results.');
    }

    public function singleElementProvider()
    {
        return [
            [4, $this->defaultValidData + [3 => 4]],
            [0, $this->defaultValidData + [3 => 0]],
            [-2, $this->defaultValidData],
            [-2.2, $this->defaultValidData],
            [2.2, $this->defaultValidData],
        ];
    }

    /**
     * @param $inputData
     * @param $expectedResponse
     * @dataProvider sortDataProvider
     */
    public function testSort($inputData, $expectedResponse)
    {
        $this->arrayManipulatorClass->load($inputData);
        $actualResponse = $this->arrayManipulatorClass->sort();

        $this->assertInternalType('array', $actualResponse);
        $this->assertEquals($expectedResponse, $actualResponse, 'Sorting the array has not generated the expected results.');
    }

    public function sortDataProvider()
    {
        return [
            [[1, 2, 3], [1, 2, 3]],
            [[3, 2, 1], [1, 2, 3]],
            [[2, 3, 1], [1, 2, 3]],
            [[-12, 3, 1], [1, 3]],
        ];
    }

    /**
     * @param $inputData
     * @param $expectedResponse
     * @dataProvider sumDataProvider
     */
    public function testSum($inputData, $expectedResponse)
    {
        $this->arrayManipulatorClass->load($inputData);
        $actualResponse = $this->arrayManipulatorClass->sum();

        $this->assertInternalType('int', $actualResponse);
        $this->assertEquals($expectedResponse, $actualResponse, 'The array sum was not calculated correctly.');
    }

    public function sumDataProvider()
    {
        return [
            [[1, 2, 3], 6],
            [[2.2, 3], 3],
            [[1, 2, 3, 4, 5], 15],
        ];
    }

    /**
     * @param $inputData
     * @param $expectedResponse
     * @param $multiple
     * @dataProvider multipleElementsDataProvider
     */
    public function testElementsMultipleOf($inputData, $multiple, $expectedResponse)
    {
        $this->arrayManipulatorClass->load($inputData);
        $actualResponse = $this->arrayManipulatorClass->elementsMultipleOf($multiple);

        $this->assertInternalType('array', $actualResponse);
        $this->assertEquals($expectedResponse, $actualResponse, 'The array sum was not calculated correctly.');
    }

    public function multipleElementsDataProvider()
    {
        return [
            [[1, 2, 3], 2, [2]],
            [[3, 6, 9], 3, [3, 6, 9]],
            [[1, 2, 3], 1, [1, 2, 3]],
        ];
    }

    /**
     * @param $inputData
     * @param $power
     * @param $expectedResponse
     * @dataProvider raiseToPowerDataProvider
     */
    public function testRaiseToPower($inputData, $power, $expectedResponse)
    {
        $this->arrayManipulatorClass->load($inputData);
        $actualResponse = $this->arrayManipulatorClass->raiseToPower($power);

        $this->assertEquals($expectedResponse, $actualResponse, 'Raising the array to a specific power was not computed correctly.');
    }

    public function raiseToPowerDataProvider()
    {
        return [
            [[1, 2, 3], 2, [1, 4, 9]],
            [[3, 6, 9], 2, [9, 36, 81]],
            [[1, 2, 3], 3, [1, 8, 27]],
            [[1, 2, 3], -3, null],
            [[1, 2, 3], 0, null],
        ];
    }

    /**
     * @param $inputData
     * @param $expectedResponse
     * @dataProvider toStringDataProvider
     */
    public function testToString($inputData, $expectedResponse)
    {
        $this->arrayManipulatorClass->load($inputData);
        $actualResponse = (string)$this->arrayManipulatorClass;

        $this->assertInternalType('string', $actualResponse);
        $this->assertEquals($expectedResponse, $actualResponse, 'Class toString did not match expected string.');
    }

    public function toStringDataProvider()
    {
        return [
            [[1, 2, 3], 'Data: 1, 2, 3'],
            [[-2, 2, 3], 'Data: 2, 3'],
            [[-2, 2.2, 3], 'Data: 3'],
            [[-2, 2.2, 3.3], 'No data is stored.'],
        ];
    }
} 