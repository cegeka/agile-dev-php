<?php


interface Space {

    public function getCell(Point $point);

    public function setCell(Cell $cell);

    public function getSpaceCellCount();

    public function getRandomPointInSpace();

}