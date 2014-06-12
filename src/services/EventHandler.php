<?php


class EventHandler {

    protected $events = array();

    protected static $world = null;


    public function __construct(World $world)
    {
        self::$world = $world;
    }


    public static function spawnGrass()
    {
        $event = new GrowGrassEvent( self::$world );
        $event->run();
    }

    public static function killGrass(Point $location)
    {
        $event = new KillGrassEvent( self::$world, $location );
        $event->run();
    }

    public static function spreadGrass(Point $location)
    {
        $event = new SpreadGrassEvent( self::$world, $location );
        $event->run();
    }


    public static function spawnSheep()
    {
        $event = new SpawnSheepEvent( self::$world );
        $event->run();
    }

}