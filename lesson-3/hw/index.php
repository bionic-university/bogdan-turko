<?php
/**
 * Created by PhpStorm.
 * User: *buntu
 * Date: 10/27/14
 * Time: 2:01 PM
 */
    include 'vendor/autoload.php';

    use Seller\Cache\rentingCountInterface;
    use Seller\Cache\Cache;
    use Seller\Cache\Coloring;

    $cache = new Cache;
    $colors = new Coloring();

    if(count($argv) < 2) $argv[1]="UAH";
    $currency = $argv[1];


    echo $colors->getColoredString($cache->getRent($currency), "green");