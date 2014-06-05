<?php


class WorldTest extends \PHPUnit_Framework_TestCase {

    /** @var World */
    protected $world;


    public function setUp()
    {
        parent::setUp();

        $this->world = new World( 10 );
    }


    /**
     * @covers World::getSpaceCellCount()
     * @dataProvider spaceCellCountDataProvider
     */
    public function testGetSpaceCellCount($size, $expectedCellCount)
    {
        $world = new World( $size );

        $this->assertEquals( $expectedCellCount, $world->getSpaceCellCount() );
    }

    public function spaceCellCountDataProvider()
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
     * @covers World::getGrassCount()
     */
    public function testGrassDoesNotGetAddedOnSixthDay()
    {
        $world = new World(10, 5);
        $this->assertEquals( 0, $world->getGrassCount() );

        $world->passDay();
        $this->assertEquals( 0, $world->getGrassCount() );
    }

    /**
     * @covers World::passDay()
     * @covers World::checkEvents()
     * @covers World::checkEventsOnAgeChange()
     * @covers World::addGrassToWorld()
     * @covers World::getGrassCount()
     */
    public function testGrassGetsAddedOnSeventhDay()
    {
        $world = new World(10, 6);
        $this->assertEquals( 0, $world->getGrassCount() );

        $world->passDay();
        $this->assertEquals( 1, $world->getGrassCount() );
    }

}