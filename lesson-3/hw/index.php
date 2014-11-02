<?php

    include 'vendor/autoload.php';

    use Seller\Cache\Cache;
    use Seller\Cache\Coloring;

    $cache = new Cache;
    $colors = new Coloring();

    if(count($argv) < 2) $argv[1]="UAH";
    $currency = $argv[1];

    try{
        echo $colors->getColoredString($cache->getRent($currency), "white");
    }
    catch (Exception $e){
        echo $colors->getColoredString($e->getMessage(), "red").PHP_EOL; die;
    }


?>