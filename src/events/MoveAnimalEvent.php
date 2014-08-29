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
        $newPoint = new Point( $this->animal->getLocation()->getX() + $this->getOffset(), $this->animal->getLocation()->getY() + $this->getOffset() );
        if( $this->world->getGrid()->isValidPoint( $newPoint ) && get_class( $this->world->getCell( $newPoint ) ) == 'Cell' ) {
            $this->animal->moveTo( $newPoint );
        }
    }

    protected function getOffset()
    {
        return (int) rand(-1, 1);
    }

}