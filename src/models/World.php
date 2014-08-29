<?php


class World {

    protected $size;

    protected $age;

    protected $grid;

    protected $filesystem;


    public function __construct($size = 10, $age = 0)
    {
        $this->size = $size;
        $this->age = $age;

        $this->filesystem = new Filesystem();
    }


    public function render()
    {
        for( $x = 0; $x < $this->grid->getSize(); ++$x ) {
            for( $y = 0; $y < $this->grid->getSize(); ++$y ) {
                $point = new Point($x, $y);
                echo $this->getCell($point)->render();
            }
        }
    }

    public function saveToFile($file = 'world.json', $overrideExisting = true)
    {
        $data = new StdClass();
        $data->world = new StdClass();
        $data->world->age = $this->getDaysOld();
        $data->world->size = $this->getSize();
        $data->world->grass = array();

        $grassCells = $this->grid->getGrassCells();
        foreach( $grassCells as $grassCell ) {
            $grass = new StdClass();
            $grass->x = $grassCell->getX();
            $grass->y = $grassCell->getY();
            $grass->age = 0;

            array_push( $data->world->grass, $grass );
        }

        $this->filesystem->write( __DIR__ . '/../../saves/' . $file, $data, $overrideExisting );
    }

    public function loadFromFile($file = 'world.json')
    {
        try {
            $data = $this->filesystem->read( __DIR__ . '/../../saves/' . $file );

            $this->age = new Age( $data->world->age );
            $this->grid = new Matrix( $data->world->size );

            foreach( $data->world->grass as $grass ) {
                $point = new Point($grass->x, $grass->y);
                $this->setCell( new Grass( $point, $grass->age ) );
            }

        } catch( Exception $e ) {
            // ...
        }
    }

    public function getCell(Point $point)
    {
        return $this->grid->getCell( $point );
    }

    public function setCell(Cell $cell)
    {
        $this->grid->setCell( $cell );
    }

    public function getSize()
    {
        return $this->grid->getSize();
    }

    public function getDaysOld()
    {
        return $this->age;
    }

} 