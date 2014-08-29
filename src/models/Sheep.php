<?php


class Sheep extends Animal {

    public function __construct(Point $location, $daysOld = 0)
    {
        parent::__construct($location, new Age( $daysOld) );
    }


    public function render()
    {
        return '<img src="images/sheep.png" class="animal" />';
    }


    protected function checkEvents()
    {
        if( $this->getDaysOld() === 29 ) {
            EventHandler::killAnimal( $this );
            return;
        }

        EventHandler::moveAnimal( $this );
    }

}