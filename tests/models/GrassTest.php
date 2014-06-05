<?php


class GrassTest extends \PHPUnit_Framework_TestCase {

    /** @var Grass */
    protected $grass;


    public function setUp()
    {
        parent::setUp();
    }


    /**
     * @covers Grass::__construct()
     * @covers Grass::render()
     */
    public function testRender()
    {
        $cell = new Grass();
        $this->assertEquals( '<div class="cell grass"></div>', $cell->render() );
    }

}