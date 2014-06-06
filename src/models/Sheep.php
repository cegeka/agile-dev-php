<?php


class Sheep extends Animal {

    public function __construct(Point $location, $daysOld = 0)
    {
        parent::__construct($location, new Age( $daysOld) );
    }

}