<?php


class MatrixTest extends \PHPUnit_Framework_TestCase {

    /** @var Matrix */
    protected $matrix;


    public function setUp()
    {
        parent::setUp();

        $this->matrix = new Matrix( 10 );
    }


    /**
     * @covers Matrix::setCell()
     * @covers Matrix::getCell()
     * @covers Matrix::isValidPoint()
     */
    public function testSetCell()
    {
        $grassCell = new Grass();
        $point = new Point(7, 3);

        $this->matrix->setCell( $point, $grassCell);

        $this->assertEquals( $grassCell, $this->matrix->getCell( $point ) );
    }

    /**
     * @covers Matrix::getCell()
     * @covers Matrix::isValidPoint()
     * @expectedException InvalidArgumentException
     */
    public function testGetCell_throwsExceptionIfPointIsOutsideOfMatrix()
    {
        $this->matrix->getCell( new Point( 15, 9 ) );
    }

    /**
     * @covers Matrix::__construct()
     * @covers Matrix::initContent()
     * @covers Matrix::getSpaceCellCount()
     * @dataProvider spaceCellCountDataProvider
     */
    public function testGetSpaceCellCount($size, $expectedCellCount)
    {
        $matrix = new Matrix( $size );

        $this->assertEquals( $expectedCellCount, $matrix->getSpaceCellCount() );
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
     * @covers Matrix::__construct()
     * @covers Matrix::initContent()
     * @covers Matrix::getSize()
     * @dataProvider sizeDataProvider
     */
    public function testGetSize($size)
    {
        $matrix = new Matrix( $size );

        $this->assertEquals( $size, $matrix->getSize() );
    }

    public function sizeDataProvider()
    {
        return array(
            array(1),
            array(5),
            array(10),
            array(14)
        );
    }

    /**
     * @covers Matrix::getRandomPointInSpace()
     */
    public function testGetRandomPointInSpace()
    {
        for( $i = 0; $i < 25; ++$i ) {
            $point = $this->matrix->getRandomPointInSpace();
            $this->assertTrue( $point->getX() < $this->matrix->getSize() );
            $this->assertTrue( $point->getX() >= 0 );

            $this->assertTrue( $point->getY() < $this->matrix->getSize() );
            $this->assertTrue( $point->getY() >= 0 );
        }
    }

    /**
     * @covers Matrix::getGrassCells()
     * @covers Matrix::findCellsByType()
     */
    public function testGetGrassCells()
    {
        $this->assertEquals( array(), $this->matrix->getGrassCells() );

        $grassCell1 = new Grass();
        $this->matrix->setCell( new Point( 5, 3 ), $grassCell1);
        $this->assertEquals( array( $grassCell1 ), $this->matrix->getGrassCells() );

        $grassCell2 = new Grass();
        $this->matrix->setCell( new Point( 9, 6 ), $grassCell2);
        $this->assertEquals( array( $grassCell1, $grassCell2 ), $this->matrix->getGrassCells() );
    }

}