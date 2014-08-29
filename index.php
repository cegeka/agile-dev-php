<?php

    require __DIR__.'/vendor/autoload.php';
    require __DIR__.'/helpers.php';


    $world = new \Godgame\Models\World();
    $world->loadFromFile();
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
            </div>
        </header>
        <div class="world">
            <?php $world->render(); ?>
        </div>
        <?php $world->saveToFile(); ?>
    </body>
</html>