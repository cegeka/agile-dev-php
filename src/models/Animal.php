<?php


abstract class Animal {

    use Ageable;
    use Locationable;


    /** @var Age */
    protected $age;

    /** @var Point */
    protected $location;


    public function __construct(Point $location, Age $age)
    {
        $this->age = $age;
        $this->location = $location;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public abstract function render();

}