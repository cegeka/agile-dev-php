<?php


class PointTest extends \PHPUnit_Framework_TestCase {

    /** @var Point */
    protected $point;


    public function setUp()
    {
        parent::setUp();

        $this->point = new Point( 10, 12 );
    }


    /**
     * @covers Point::__construct()
     * @covers Point::getX()
     * @covers Point::getY()
     * @dataProvider constructDataProvider
     */
    public function testConstruct($x, $y)
    {
        $point = new Point( $x, $y );

        $this->assertEquals( $x, $point->getX() );
        $this->assertEquals( $y, $point->getY() );
    }

    public function constructDataProvider()
    {
        return array(
            array(1, 6),
            array(5, 2),
            array(10, 7),
            array(14, 0)
        );
    }

    /**
     * @covers Point::toString()
     * @dataProvider toStringDataProvider
     */
    public function testToString($x, $y, $expectedString)
    {
        $point = new Point( $x, $y );

        $this->assertEquals( $expectedString, $point->toString() );
    }

    public function toStringDataProvider()
    {
        return array(
            array(1, 6,  '(1,6)'),
            array(5, 2,  '(5,2)'),
            array(10, 7, '(10,7)'),
            array(14, 0, '(14,0)')
        );
    }

}