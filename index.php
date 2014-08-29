<?php

    require __DIR__.'/vendor/autoload.php';
    require __DIR__.'/helpers.php';

    $world = new World();
    $eventHandler = new EventHandler( $world );

    if( isset( $_GET['restart_world'] ) && $_GET['restart_world'] == 'true' ) {
        $world->restart();
    }
    $world->loadFromFile();

    if( isset( $_GET['pass_day'] ) && $_GET['pass_day'] == 'true' ) {
        $world->passDay();
    }
?>

<html>
    <head>
        <style>
            div .cell {
                width: 50px;
                height: 50px;
                background-image:url('images/dirt.png');
                background-size: 100%;
                float: left;
                margin: 0 2px 2px 0;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
            }

            div .cell:nth-child(<?php echo $world->getSize(); ?>n+1) {
                clear:both;
            }

            div .grass {
                background-image:url('images/grass.png');
            }

            .animal {
                width: 40px;
                height: 40px;
                padding: 5px;
            }
        </style>

    </head>
    <body>
        <header>
            <div class="actions">
                <a href="index.php?pass_day=true">Pass day</a>
                <a href="index.php?restart_world=true">Restart world</a>
            </div>
            <p>
                <b>World age</b>: <?php echo $world->getDaysOld(); ?>
            </p>
        </header>
        <div class="world">
            <?php $world->render(); ?>
        </div>
        <?php $world->saveToFile(); ?>
    </body>
</html>