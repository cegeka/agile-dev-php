<?php

class Calculator
{
    /*public static function add($lhs, $rhs)
    {
        //@todo Implement me.
    }

    public static function subtract($lhs, $rhs)
    {
        //@todo Implement me.
    }

    public static function multiply($lhs, $rhs)
    {
        //@todo Implement me.
    }

    public static function divide($lhs, $rhs)
    {
        //@todo Implement me.
    }

    public static function modulus($lhs, $rhs) {
        //@todo Implement me.
    }*/

    public static function add($lhs, $rhs)
    {
        return $lhs + $rhs;
    }

    public static function subtract($lhs, $rhs)
    {
        return $lhs - $rhs;
    }

    public static function multiply($lhs, $rhs)
    {
        return $lhs * $rhs;
    }

    public static function divide($lhs, $rhs)
    {
        return $lhs / $rhs;
    }

    public static function modulus($lhs, $rhs)
    {
        return $lhs % $rhs;
    }
} 