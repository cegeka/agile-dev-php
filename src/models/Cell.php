<?php


class Cell {

    use Ageable;


    protected $age = null;

    protected $location = null;


    public function __construct(Point $location, $age = 0)
    {
        $this->age = new Age( $age );
        $this->location = $location;
    }


    public function getAge()
    {
        return $this->age;
    }

    public function getLocation()
    {
        return $this->location;
    }


    public function render(Animal $animal = null)
    {
        $content = '';
        if( !is_null($animal) ) {
            $content = $animal->render();
        }

        return '<div class="cell">'. $content .'</div>';
    }

}