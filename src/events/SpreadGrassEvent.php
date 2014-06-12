<?php


class SpreadGrassEvent extends Event {

    public function __construct(World $world, Point $location)
    {
        $this->world = $world;
        $this->location = $location;
    }

    public function run()
    {
        $newPoint = new Point($this->location->getX() + $this->getOffset(), $this->location->getY() + $this->getOffset());
        if( $this->world->getGrid()->isValidPoint( $this->location) && get_class( $this->world->getCell( $newPoint ) ) == 'Cell' ) {
            $this->world->addGrass( $newPoint );
        }
    }

    protected function getOffset()
    {
        return (int) rand(-1, 1);
    }

}