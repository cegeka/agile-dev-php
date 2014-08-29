<?php


class World implements Space  {

    use Ageable;


    protected $age;
    protected $grid;

    protected $sheepCollection;
    protected $wolfCollection;

    protected $filesystem;


    public function __construct($size = 10, $age = 0)
    {
        $this->age = new Age( $age );
        $this->grid = new Matrix( $size );

        $this->sheepCollection = new AnimalCollection();
        $this->wolfCollection = new AnimalCollection();

        $this->filesystem = new Filesystem();
    }


    public function getSheep()
    {
        return $this->sheepCollection;
    }

    public function getWolves()
    {
        return $this->wolfCollection;
    }


    public function passDay()
    {
        $this->increaseAge();
        $this->checkEvents();

        $this->grid->update();

        $this->sheepCollection->increaseAnimalAge();
        $this->wolfCollection->increaseAnimalAge();
    }

    protected function checkEvents()
    {
        if( $this->getDaysOld() === 7 ) {
            EventHandler::spawnGrass();
        }

        if( $this->getDaysOld() === 19 ) {
            EventHandler::spawnSheep();
        }
    }

    public function addGrass(Point $location)
    {
        $this->setCell( new Grass( $location ) );
    }

    public function addSheep(Point $location)
    {
        $this->sheepCollection->addAnimal(
            new Sheep( $location )
        );
    }

    public function getGrassCount()
    {
        return count( $this->grid->getGrassCells() );
    }

    public function getAnimalAt(Point $point)
    {
        $animal = $this->sheepCollection->getAnimalAt( $point );
        if( is_null($animal) ) {
            $animal = $this->wolfCollection->getAnimalAt( $point );
        }

        return $animal;
    }

    public function render()
    {
        for( $x = 0; $x < $this->grid->getSize(); ++$x ) {
            for( $y = 0; $y < $this->grid->getSize(); ++$y ) {
                $point = new Point($x, $y);
                echo $this->getCell($point)->render( $this->getAnimalAt( $point ) );
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
            $grass->age = $this->grid->getCell( $grassCell )->getDaysOld();

            array_push( $data->world->grass, $grass );
        }

        $data->world->sheep = $this->sheepCollection->toJson();
        $data->world->wolves = $this->wolfCollection->toJson();

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

            $this->sheepCollection->fromJson( $data->world->sheep, 'Sheep' );
//            $this->sheepCollection->fromJson( $data->world->wolves, 'Wolf' );
        } catch( Exception $e ) {
            // ...
        }
    }


    public function getAge()
    {
        return $this->age;
    }

    public function getGrid()
    {
        return $this->grid;
    }

    public function getSize()
    {
        return $this->grid->getSize();
    }

    public function getCell(Point $point)
    {
        return $this->grid->getCell( $point );
    }

    public function setCell(Cell $cell)
    {
        $this->grid->setCell( $cell );
    }

    public function getSpaceCellCount()
    {
        return $this->grid->getSpaceCellCount();
    }

    public function getRandomPointInSpace()
    {
        return $this->grid->getRandomPointInSpace();
    }

}