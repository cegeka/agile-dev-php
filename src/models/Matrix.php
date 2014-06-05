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
        for( $i = 0; $i < $this->size; ++$i ) {
            $line = array();
            for( $j = 0; $j < $this->size; ++$j ) {
                $cell = new Cell();
                array_push( $line, $cell );
            }

            array_push( $this->content, $line );
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

    public function setCell(Point $point, Cell $cell)
    {
        if( $this->isValidPoint( $point ) ) {
            return $this->content[ $point->getX() ][ $point->getY() ] = $cell;
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
        if( empty($type) ) {
            throw new InvalidArgumentException('Type cannot be empty');
        }

        $results = array();
        for( $x = 0; $x < $this->size; ++$x ) {
            for( $y = 0; $y < $this->size; ++$y ) {

                if( get_class( $this->content[ $x ][ $y ] ) === $type ) {
                    array_push( $results, $this->content[ $x ][ $y ] );
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

    protected function isValidPoint(Point $point)
    {
        if( !is_null($point) && $point->getX() < $this->size && $point->getY() < $this->size ) {
            return true;
        }

        throw new InvalidArgumentException( 'Point is invalid: '. $point->toString() );
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