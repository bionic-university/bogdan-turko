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

    $colors = new Coloring();
    $cache = new Cache;

    echo $colors->getColoredString("Input payment amount: ", "green");
    $f = fopen('php://stdin', 'r');
    $input = fgets($f, 10);
    fclose($f);
    $cost = (float)$input;

    if($cost > 1){

    }
    else{
        echo $colors->getColoredString("Please input correct number!", "red").PHP_EOL; die;
    }


    if(is_float($cost)==false){

    }

    echo $colors->getColoredString("Input amount of money received: ", "green");
    $f = fopen('php://stdin', 'r');
    $input = fgets($f, 10);
    fclose($f);
    $pay = (float)$input;

    if($cost > 1){

    }
    else{
        echo $colors->getColoredString("Please input correct number!", "red").PHP_EOL; die;
    }

    echo $colors->getColoredString("Result: ", "brown").PHP_EOL;
    echo $colors->getColoredString($cache->getRent($cost, $pay), "green");