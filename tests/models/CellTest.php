<?php


class CellTest extends \PHPUnit_Framework_TestCase {

    protected $cell;


    public function setUp()
    {
        parent::setUp();
    }


    /**
     * @covers Cell::__construct()
     * @covers Cell::render()
     */
    public function testRender()
    {
        $cell = new Cell();
        $this->assertEquals( '<div class="cell"></div>', $cell->render() );
    }

}