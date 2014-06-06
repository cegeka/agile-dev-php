<?php


trait Ageable {

    public function getDaysOld()
    {
        return $this->age->getDays();
    }

    public function increaseAge()
    {
        return $this->age->increaseAge();
    }

}