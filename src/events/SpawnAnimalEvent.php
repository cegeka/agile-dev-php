<?php


class SpawnAnimalEvent extends Event {

    public function __construct(World $world, $animalType = 'Sheep', Point $location = null)
    {
        $this->world = $world;
        $this->location = $location;
        $this->animalType = $animalType;
    }

    public function run()
    {
        if( is_null($this->location) ) {
            $this->location = $this->world->getRandomPointInSpace();
        }

        $this->world->{'add'. $this->animalType}( $this->location );
    }

}