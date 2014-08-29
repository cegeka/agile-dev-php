<?php


class Cell {

    public function __construct()
    {
        // ...
    }


    public function render()
    {
        $content = '';

        return '<div class="cell">'. $content .'</div>';
    }

}