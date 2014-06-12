<?php


class Grass extends Cell {

    public function __construct(Point $location, $age = 0)
    {
        parent::__construct($location, $age);
    }


    protected function checkEvents()
    {
        if( $this->getDaysOld() == 22 ) {
            EventHandler::killGrass( $this->location );
        }

        if( $this->getDaysOld() % 7 === 0 ) {
            EventHandler::spreadGrass( $this->location );
        }
    }


    public function render(Animal $animal = null)
    {
        $content = '';
        if( !is_null($animal) ) {
            $content = $animal->render();
        }

        return '<div class="cell grass">'. $content .'</div>';
    }

}