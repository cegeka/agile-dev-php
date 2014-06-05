<?php


class World implements Space  {

    protected $age;

    protected $content;


    public function __construct($size = 10, $age = 0)
    {
        $this->age = $age;
        $this->content = new Matrix( $size );
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getSize()
    {
        return $this->content->getSize();
    }

    public function getCell(Point $point)
    {
        return $this->content->getCell( $point );
    }

    public function setCell(Point $point, Cell $cell)
    {
        $this->content->setCell( $point, $cell );
    }

    public function getSpaceCellCount()
    {
        return $this->content->getSpaceCellCount();
    }

    public function getRandomPointInSpace()
    {
        return $this->content->getRandomPointInSpace();
    }

    public function passDay()
    {
        $this->age += 1;
        $this->checkEvents();
    }

    protected function checkEvents()
    {
        $this->checkEventsOnAgeChange();
    }

    protected function checkEventsOnAgeChange()
    {
        if( $this->age === 7 ) {
            $this->addGrassToWorld();
        }
    }

    protected function addGrassToWorld()
    {
        $this->setCell( $this->getRandomPointInSpace(), new Grass() );
    }

    public function getGrassCount()
    {
        return count( $this->content->getGrassCells() );
    }

    public function render()
    {
        $this->content->render();
    }

} 