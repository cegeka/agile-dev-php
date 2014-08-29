<?php


class MoveAnimalEvent extends Event {

    protected $world;

    protected $animal;


    public function __construct(World $world, Animal $animal)
    {
        $this->world = $world;
        $this->animal = $animal;
    }


    public function run()
    {
        $this->animal->moveTo( $this->world->getLocationNearTo( $this->animal->getLocation(), 1) );
    }

}