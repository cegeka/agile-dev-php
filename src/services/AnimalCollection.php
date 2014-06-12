<?php


class AnimalCollection {

    protected $animals;

    public function __construct()
    {
        $this->animals = array();
    }


    public function addItem(Animal $item)
    {
        array_push( $this->animals, $item );
    }

    public function increaseAnimalAge()
    {
        foreach( $this->animals as $animal ) {
            $animal->increaseAge();
        }
    }

    public function getAnimalAt(Point $point)
    {
        foreach( $this->animals as $animal ) {
            if( $animal->isAt($point) ) {
                return $animal;
            }
        }

        return null;
    }

    public function getAnimalClosestTo(Point $point)
    {
        $distance = -1;
        $closest = null;

        foreach( $this->animals as $animal ) {
            if( $distance < 0 ) {
                $closest = $animal;
                continue;
            }

            if( $animal->getLocation()->getDistanceTo($point) < $distance ) {
                $closest = $animal;
            }
        }

        return $closest;
    }

    public function toJson()
    {
        $results = array();

        foreach( $this->animals as $animal ) {
            $entry = new StdClass();
            $entry->x = $animal->getLocation()->getX();
            $entry->y = $animal->getLocation()->getY();
            $entry->age = $animal->getDaysOld();

            array_push( $results, $entry );
        }

        return $results;
    }

}