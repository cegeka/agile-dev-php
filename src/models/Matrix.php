<?php


class Matrix {

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

    public function getCell(Point $point)
    {
        if( $this->isValidPoint( $point ) ) {
            return $this->content[ $point->getX() ][ $this->getY() ];
        }

        return null;
    }

    public function setCell(Point $point, Cell $cell)
    {
        if( $this->isValidPoint( $point ) ) {
            return $this->content[ $point->getX() ][ $this->getY() ] = $cell;
        }
    }

    protected function isValidPoint(Point $point)
    {
        if( is_null($point) && $point->getX() < $this->size && $point->getY() < $this->size ) {
            return true;
        }

        throw new InvalidArgumentException( 'Point is invalid: '. $point->toString() );
    }

} 