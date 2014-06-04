<?php


class World {

    protected $age;

    protected $size;

    protected $content;


    public function __construct($size = 15, $age = 0)
    {
        $this->size = $size;
        $this->age = $age;
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

    public function getAge()
    {
        return $this->age;
    }

    public function getCell($x, $y)
    {
        return $this->content[ $x ][ $y ];
    }

    public function setCell($x, $y, Cell $cell)
    {
        $this->content[ $x ][ $y ] = $cell;
    }

    public function getWorldSize()
    {
        return $this->size * $this->size;
    }

    public function passDay()
    {
        $this->age += 1;
        $this->checkEvents();
    }

    public function checkEvents()
    {
        $this->checkEventsOnAgeChange();
    }

    public function checkEventsOnAgeChange()
    {
        if( $this->age === 7 ) {
            $this->addGrassToWorld();
        }
    }

    protected function addGrassToWorld()
    {
       $x = (int) rand(0, $this->size - 1 );
       $y = (int) rand(0, $this->size - 1 );

        $this->setCell( $x, $y, new Grass() );
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

} 