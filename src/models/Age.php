<?php


class Age {

    protected $days;


    public function __construct($age = 0)
    {
        $this->days = $age;
    }


    public function addAge(Age $age)
    {
        $this->addDays($age->getDays() );
    }

    public function addDays($days)
    {
        $this->days += $days;
    }

    public function getDays()
    {
        return $this->days;
    }

    public function increaseAge()
    {
        $this->addDays( 1 );
    }

}