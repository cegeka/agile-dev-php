<?php


class GrassTest extends \PHPUnit_Framework_TestCase {

    /** @var Grass */
    protected $grass;


    public function setUp()
    {
        parent::setUp();

        $this->grass = new Grass( 10 );
    }


    /**
     * @covers Grass::__construct()
     * @covers Grass::render()
     */
    public function testRender()
    {
        $grass = new Grass();
        $this->assertEquals( '<div class="cell grass"></div>', $grass->render() );
    }

    /**
     * @covers Grass::getAge()
     */
    public function testGetAge()
    {
        $this->assertEquals( 10, $this->grass->getAge()->getDays() );
    }

}