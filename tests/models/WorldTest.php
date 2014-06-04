<?php


class WorldTest extends \PHPUnit_Framework_TestCase {

    protected $world;


    public function setUp()
    {
        parent::setUp();

        $this->world = new World( 10 );
    }


    /**
     * @covers World::getWorldSize()
     * @dataProvider worldSizeDataProvider
     */
    public function testGetWorldSize($size, $expectedWorldSize)
    {
        $world = new World( $size );

        $this->assertEquals( $expectedWorldSize, $world->getWorldSize() );
    }

    public function worldSizeDataProvider()
    {
        return array(
            array(1, 1),
            array(5, 25),
            array(10, 100),
            array(14, 196)
        );
    }

    /**
     * @covers World::passDay()
     * @covers World::checkEvents()
     * @covers World::checkEventsOnAgeChange()
     */
    public function testPassDay()
    {
        $this->assertEquals( 0, $this->world->getAge() );

        $this->world->passDay();
        $this->assertEquals( 1, $this->world->getAge() );
    }

    /**
     * @covers World::passDay()
     * @covers World::checkEvents()
     * @covers World::checkEventsOnAgeChange()
     * @covers World::getGrassCells()
     * @covers World::findCellsByType()
     */
    public function testGrassDoesNotGetAddedOnSixthDay()
    {
        $world = new World(10, 5);
        $this->assertCount( 0, $world->getGrassCells() );

        $world->passDay();
        $this->assertCount( 0, $world->getGrassCells() );
    }

    /**
     * @covers World::passDay()
     * @covers World::checkEvents()
     * @covers World::checkEventsOnAgeChange()
     * @covers World::addGrassToWorld()
     * @covers World::getGrassCells()
     * @covers World::findCellsByType()
     */
    public function testGrassGetsAddedOnSeventhDay()
    {
        $world = new World(10, 6);
        $this->assertCount( 0, $world->getGrassCells() );

        $world->passDay();
        $this->assertCount( 1, $world->getGrassCells() );
    }

}