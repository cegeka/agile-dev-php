<?php


use Godgame\Models\Age;

class AgeTest extends \PHPUnit_Framework_TestCase {

    protected $age;


    public function setUp()
    {
        parent::setUp();

        $this->age = new Age( 10 );
    }


    /**
     * @covers Godgame\Models\Age::__construct()
     * @covers Godgame\Models\Age::getDays()
     */
    public function testGetDays()
    {
        $this->age = new Age( 25 );

        $this->assertEquals( 25, $this->age->getDays() );
    }

    /**
     * @covers Godgame\Models\Age::addDays()
     * @covers Godgame\Models\Age::getDays()
     */
    public function testAddDays()
    {
        $this->age->addDays( 15 );

        $this->assertEquals( 25, $this->age->getDays() );
    }

    /**
     * @covers Godgame\Models\Age::addAge()
     * @covers Godgame\Models\Age::getDays()
     */
    public function testAddAge()
    {
        $age = new Age( 15 );
        $this->age->addAge( $age );

        $this->assertEquals( 25, $this->age->getDays() );
    }

    /**
     * @covers Godgame\Models\Age::increaseAge()
     * @covers Godgame\Models\Age::getDays()
     */
    public function testIncreaseAge()
    {
        $this->age->increaseAge();
        $this->assertEquals( 11, $this->age->getDays() );

        $this->age->increaseAge();
        $this->age->increaseAge();
        $this->assertEquals( 13, $this->age->getDays() );
    }

}