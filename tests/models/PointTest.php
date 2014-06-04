<?php


class PointTest extends \PHPUnit_Framework_TestCase {

    protected $point;


    public function setUp()
    {
        parent::setUp();

        $this->point = new Point( 10, 12 );
    }


    /**
     * @covers Point::getX()
     */
    public function testGetX()
    {
        $this->fail('Not implemented yet');
    }

    /**
     * @covers Point::getY()
     */
    public function testAddDays()
    {
        $this->fail('Not implemented yet');
    }

    /**
     * @covers Point::toString()
     */
    public function testToString()
    {
        $this->fail('Not implemented yet');
    }

}