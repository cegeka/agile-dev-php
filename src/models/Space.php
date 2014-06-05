<?php


interface Space {

    public function getCell(Point $point);

    public function setCell(Point $point, Cell $cell);

    public function getSpaceCellCount();

    public function getRandomPointInSpace();

}