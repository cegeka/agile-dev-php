<?php


trait Locationable {

    public function isAt(Point $point)
    {
        return $this->location->getX() == $point->getX() && $this->location->getY() == $point->getY();
    }

    public function getDistanceTo(Point $point)
    {
        $x = $this->location->getX() -  $point->getX();
        $y = $this->location->getY() - $point->getY();

        return sqrt( ($x * $x) + ($y * $y) );
    }

}