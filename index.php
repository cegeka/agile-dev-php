<?php

    require __DIR__.'/vendor/autoload.php';
    require __DIR__.'/helpers.php';

    echo 'Hello world!';

    $world = new World();
    for( $i = 0; $i < 7; ++$i ) {
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
                text-align: center;
                padding-top: 20px;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
            }

            div .cell:nth-child(<?php echo $world->getSize(); ?>n+1) {
                clear:both;
            }

            div .grass {
                background-image:url('images/grass.png');
            }
        </style>

    </head>
    <body>
        <div class="world">
            <?php $world->render(); ?>
        </div>
    </body>
</html>