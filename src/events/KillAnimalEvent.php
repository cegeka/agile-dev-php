<?php


class KillAnimalEvent extends Event {

    protected $world;

    protected $animal;


    public function __construct(World $world, Animal $animal)
    {
        $this->world = $world;
        $this->animal = $animal;
    }


    public function run()
    {
        $animalRemoved = $this->world->getSheep()->removeAnimal( $this->animal );
        if( !$animalRemoved ) {
            $this->world->getWolves()->removeAnimal( $this->animal );
        }
    }

}