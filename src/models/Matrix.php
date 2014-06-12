<?php


class Matrix implements Space {

    protected $size;

    protected $content;


    public function __construct($size)
    {
        $this->size = $size;
        $this->initContent();
    }

    public function initContent()
    {
        $this->content = array();
        for( $x = 0; $x < $this->size; ++$x ) {
            $row = array();
            for( $y = 0; $y < $this->size; ++$y ) {
                $cell = new Cell( new Point( $x, $y ) );
                array_push( $row, $cell );
            }

            array_push( $this->content, $row );
        }
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getCell(Point $point)
    {
        if( $this->isValidPoint( $point ) ) {
            return $this->content[ $point->getX() ][ $point->getY() ];
        }

        return null;
    }

    public function setCell(Cell $cell)
    {
        $point = $cell->getLocation();
        if( $this->isValidPoint($point) ) {
            $this->content[ $point->getX() ][ $point->getY() ] = $cell;
        }
    }

    public function getSpaceCellCount()
    {
        return $this->size * $this->size;
    }

    public function getGrassCells()
    {
        return $this->findCellsByType('Grass');
    }

    protected function findCellsByType($type)
    {
        $results = array();
        for( $x = 0; $x < $this->size; ++$x ) {
            for( $y = 0; $y < $this->size; ++$y ) {

                if( get_class( $this->content[ $x ][ $y ] ) === $type ) {
                    array_push( $results, new Point( $x, $y ) );
                }

            }
        }

        return $results;
    }

    public function getRandomPointInSpace()
    {
        $x = (int) rand(0, $this->size - 1 );
        $y = (int) rand(0, $this->size - 1 );

        return new Point( $x, $y );
    }

    public function isValidPoint(Point $point)
    {
        if( $point->getX() > $this->size-1 || $point->getY() > $this->size-1 ) {
            return false;
        }

        if( $point->getX() < 0 || $point->getY() < 0 ) {
            return false;
        }

        return true;
    }

    public function update()
    {
        for( $x = 0; $x < $this->size; ++$x ) {
            for( $y = 0; $y < $this->size; ++$y ) {

                $this->content[ $x ][ $y ]->passDay();

            }
        }
    }

    public function render()
    {
        foreach( $this->content as $row ) {
            foreach( $row as $cell ) {
                echo $cell->render();
            }
        }
    }

} 