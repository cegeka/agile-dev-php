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
        for( $x = 0; $x < $this->size; ++$x ) {
            $row = array();
            for( $y = 0; $y < $this->size; ++$y ) {
                $cell = new Cell( new Point( $x, $y ) );
                array_push( $row, $cell );
            }

            array_push( $this->content, $row );
        }
    }

    public function getGrassCells()
    {
        return array();
    }

    public function render()
    {
        foreach( $this->content as $row ) {
            foreach( $row as $cell ) {
                echo $cell->render();
            }
        }
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getCell(Point $point)
    {
        return $this->content[ $point->getX() ][ $point->getY() ];
    }

    public function setCell(Cell $cell)
    {
        $point = $cell->getLocation();
        $this->content[ $point->getX() ][ $point->getY() ] = $cell;
    }

} 