<?php

require_once 'ProductTable.php';

class ProductTableTest extends \PHPUnit_Framework_TestCase
{
    /** @var ProductTable */
    protected $table;

    public function setUp()
    {
        $this->table = new ProductTable();
    }

    public function testReadAll()
    {
        $results = $this->table->readAll();

        $this->assertEquals(1, count($results), 'The number of fixtures did not match expected result.');
        $this->assertInternalType('array', $results, 'Expecting result of readAll to be array.');

        $result = $results[0];
        $this->assertNotNull($result->id, 'ID is empty, if persistance worked correctly then it would be auto-incremented.');
        $this->assertEquals('Fixture', $result->name, 'Name did not match expected fixture data.');
        $this->assertEquals(12.35, $result->price, 'Price did not match expected fixture data.');
    }

    /**
     * @param $name
     * @param $price
     * @dataProvider insertDataProvider
     */
    public function testInsert($name, $price)
    {
        $this->markTestIncomplete();
    }

    public function insertDataProvider()
    {
        return [
            ['Integration1', 12],
            ['Integration2', 12.30],
            ['Integration3', -12.30],
        ];
    }

    public function testDelete()
    {
        $this->markTestIncomplete();
    }

    public function testReadById()
    {
        $this->markTestIncomplete();
    }

    public function testUpdate()
    {
        $this->markTestIncomplete();
    }
}