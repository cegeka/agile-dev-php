<?php


class GiveBirthEvent extends Event {

    public function __construct(World $world, Animal $animal)
    {
        $this->world = $world;
        $this->animal = $animal;
    }

    public function run()
    {
        $this->world->{'add'. get_class($this->animal)}( $this->world->getLocationNearTo( $this->animal->getLocation(), 1 ) );
    }

}