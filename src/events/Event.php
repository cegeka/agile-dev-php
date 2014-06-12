<?php


abstract class Event {

    const GROW_GRASS = 'GrowGrassEvent';

    const SPAWN_SHEEP = 'SpawnSheepEvent';



    public abstract function run();

}