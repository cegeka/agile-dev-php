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

    public function passDay()
    {
        $this->increaseAge();
        $this->checkEvents();
    }

    protected function checkEvents()
    {
        return;
    }

}