<?php


function dd($args, $callback = '')
{
    if( $callback instanceof Closure ) {
        foreach( $args as $arg ) {
            call_user_func( $callback, $arg );
        }
    } else {
        var_dump( $args );
    }

    die();
}