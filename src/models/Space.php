<?php


interface Space {

    public function setCell(Point $point, Cell $cell);

    public function getCell(Point $point);

    public function getSpaceCellsCount();

}