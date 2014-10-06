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
     * @depends      testReadAll
     */
    public function testInsert($name, $price)
    {
        $this->table->insert($name, $price);
        $results = $this->table->readAll();

        foreach ($results as $result) {
            if ($result->name != $name || $result->price != $price) {
                continue;
            }

            $this->assertEquals($name, $result->name, 'Name did not match expected');
            $this->assertEquals($price, $result->price, 'Price did not match expected');
            $this->assertNotNull($result->id);
        }
    }

    public function insertDataProvider()
    {
        return [
            ['Integration1', 12],
            ['Integration2', 12.30],
            ['Integration3', -12.30],
            ['Integration4', true],
        ];
    }

    /**
     * @depends testInsert
     */
    public function testDelete()
    {
        $startingData = $this->table->readAll();

        $this->table->insert('Data to delete', 0.0);
        $currentData = $this->table->readAll();

        $maxArrayKey = max(array_keys($currentData));
        $maxId = $currentData[$maxArrayKey]->id;

        $this->assertCount(count($startingData) + 1, $currentData);

        $this->table->delete($maxId);
        $currentData = $this->table->readAll();

        $this->assertEquals($startingData, $currentData);
    }

    /**
     * @depends testInsert
     */
    public function testReadById()
    {
        $this->table->insert('Read by id', 55.55);
        $currentData = $this->table->readAll();

        $maxArrayKey = max(array_keys($currentData));
        $maxId = $currentData[$maxArrayKey]->id;

        $actualElement = $this->table->readById($maxId);

        $this->assertEquals($maxId, $actualElement->id);
        $this->assertEquals('Read by id', $actualElement->name);
        $this->assertEquals(55.55, $actualElement->price);
    }

    /**
     * @depends testInsert
     */
    public function testUpdate()
    {
        $this->table->insert('Data to update', 66.77);
        $currentData = $this->table->readAll();

        $maxArrayKey = max(array_keys($currentData));
        $maxId = $currentData[$maxArrayKey]->id;

        $this->table->update($maxId, 'Updated data!', 99.99);
        $actualElement = $this->table->readById($maxId);

        $this->assertEquals($maxId, $actualElement->id);
        $this->assertEquals('Updated data!', $actualElement->name);
        $this->assertEquals(99.99, $actualElement->price);
    }
}