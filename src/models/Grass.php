<?php


class Grass extends Cell {

    protected $age;


    public function __construct($age = 0)
    {
        $this->age = new Age( $age );
    }


    public function getAge()
    {
        return $this->age;
    }


    public function render()
    {
        return '<div class="cell grass"></div>';
    }

}