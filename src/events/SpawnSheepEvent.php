<?php


class SpawnSheepEvent extends Event {

    public function __construct(World $world, Point $location = null)
    {
        $this->world = $world;
        $this->location = $location;
    }

    public function run()
    {
        if( is_null($this->location) ) {
            $this->location = $this->world->getRandomPointInSpace();
        }

        $this->world->addSheep( $this->location );
    }

}