<?php

class Utils
{
    public static function dumpForeach(array $array)
    {
        foreach ($array as $item) {
            echo $item . PHP_EOL;
        }
    }
}
