<?php


trait Moveable {

    public function moveTo(Point $location)
    {
        $this->location = $location;
    }

}