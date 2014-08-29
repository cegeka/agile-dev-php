<?php


use Godgame\Models\Matrix;
use Godgame\Models\Point;

class MatrixTest extends \PHPUnit_Framework_TestCase {

    protected $matrix;


    public function setUp()
    {
        parent::setUp();

        $this->matrix = new Matrix( 10 );
    }


    /**
     * @covers Matrix::getCell()
     */
    public function testGetCell()
    {
        // given a matrix with some particular cell in place see
        // if retrieving it gives the expected cell

        $this->fail('Not implemented yet');
    }

    /**
     * @covers Matrix::getCell()
     * @expectedException InvalidArgumentException
     */
    public function testGetCell_throwsExceptionIfPointIsOutsideOfMatrix()
    {
        $this->matrix->getCell( new Point( 15, 9 ) );
    }

}