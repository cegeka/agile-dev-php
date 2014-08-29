<?php


class Wolf extends Animal {

    public function __construct(Point $location, $daysOld = 0)
    {
        parent::__construct($location, new Age( $daysOld ) );
    }


    public function render()
    {
        return '<img src="images/wolf.png" class="animal" />';
    }


    protected function checkEvents()
    {
        EventHandler::moveAnimal( $this );
    }

}