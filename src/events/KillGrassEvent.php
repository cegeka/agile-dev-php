<?php


class KillGrassEvent extends Event {

    public function __construct(World $world, Point $location)
    {
        $this->world = $world;
        $this->location = $location;
    }

    public function run()
    {
        $this->world->setCell( new Cell( $this->location ) );
    }

}