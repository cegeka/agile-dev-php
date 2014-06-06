<?php


class Cell {

    use Ageable;


    public function __construct()
    {
        // ...
    }

    public function render()
    {
        return '<div class="cell"></div>';
    }

}