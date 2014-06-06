<?php


class World implements Space  {

    use Ageable;


    protected $age;
    protected $content;

    protected $sheepCollection;
    protected $wolfCollection;

    protected $filesystem;


    public function __construct($size = 10, $age = 0)
    {
        $this->age = $age;
        $this->content = new Matrix( $size );

        $this->sheepCollection = new AnimalCollection();
        $this->wolfCollection = new AnimalCollection();

        $this->filesystem = new Filesystem();
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getSize()
    {
        return $this->content->getSize();
    }

    public function getCell(Point $point)
    {
        return $this->content->getCell( $point );
    }

    public function setCell(Point $point, Cell $cell)
    {
        $this->content->setCell( $point, $cell );
    }

    public function getSpaceCellCount()
    {
        return $this->content->getSpaceCellCount();
    }

    public function getRandomPointInSpace()
    {
        return $this->content->getRandomPointInSpace();
    }

    public function passDay()
    {
        $this->age += 1;

        foreach( $this->content->getGrassCells() as $point ) {
            $this->content->getCell( $point )->increaseAge();
        }

        $this->sheepCollection->increaseAnimalAge();
        $this->wolfCollection->increaseAnimalAge();

        $this->checkEvents();
    }

    protected function checkEvents()
    {
        $this->checkEventsOnAgeChange();
    }

    protected function checkEventsOnAgeChange()
    {
        if( $this->age === 7 ) {
            $this->addGrassToWorld();
            return;
        }
        if( $this->age === 19 ) {
            $this->addSheepToWorld();
            return;
        }

        foreach( $this->content->getGrassCells() as $point ) {
            $daysOld = $this->content->getCell($point)->getDaysOld();
            if( $daysOld == 22 ) {
                $this->content->setCell( $point, new Cell() );
                continue;
            }

            if( $daysOld % 7 === 0 ) {
                $newPoint = new Point($point->getX() + $this->getOffset(), $point->getY() + $this->getOffset());
                if( $this->content->isValidPoint( $point) && get_class( $this->getCell( $newPoint ) ) == 'Cell' ) {
                    $this->setCell( $newPoint, new Grass() );
                }
            }
        }
    }

    protected function getOffset()
    {
        return (int)rand(-1, 1);
    }

    protected function addGrassToWorld()
    {
        $this->setCell( $this->getRandomPointInSpace(), new Grass() );
    }

    protected function addSheepToWorld()
    {
        $this->sheepCollection->addItem(
            new Sheep( $this->getRandomPointInSpace() )
        );
    }

    public function getGrassCount()
    {
        return count( $this->content->getGrassCells() );
    }

    public function render()
    {
        $this->content->render();
    }

    public function saveToFile($file = 'world.json', $overrideExisting = true)
    {
        $filename = __DIR__ . '/../../saves/' . $file;
        if( $overrideExisting ) {
            $this->filesystem->delete( $filename );
        }

        $data = new StdClass();
        $data->world = new StdClass();
        $data->world->age = $this->age;
        $data->world->size = $this->getSize();
        $data->world->grass = array();

        $grassCells = $this->content->getGrassCells();
        foreach( $grassCells as $grassCell ) {
            $grass = new StdClass();
            $grass->x = $grassCell->getX();
            $grass->y = $grassCell->getY();
            $grass->age = $this->content->getCell( $grassCell )->getDaysOld();

            array_push( $data->world->grass, $grass );
        }

        $this->filesystem->write( $filename, $data );
    }

    public function loadFromFile($file = 'world.json')
    {
        try {
            $data = $this->filesystem->read( __DIR__ . '/../../saves/' . $file );

            $this->age = $data->world->age;
            $this->content = new Matrix( $data->world->size );

            foreach( $data->world->grass as $grass ) {
                $this->setCell( new Point( $grass->x, $grass->y ), new Grass( $grass->age ) );
            }
        } catch( Exception $e ) {
            // ...
        }
    }

}