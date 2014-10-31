<?php
/**
 * Created by PhpStorm.
 * User: ebuntu
 * Date: 10/31/14
 * Time: 2:16 PM
 */

namespace Seller\Cache;


class Currencies {
    //public $curr = ;

    public function getCurrency($curr){
        switch ($curr){
            case "USD":
                return array(1, 2, 5, 10, 20, 50, 100);
            case "RUR":
                return array(1, 2, 5, 10, 20, 50, 100, 200, 500, 1000, 5000);
            default:
                return array(0.5, 1, 2, 5, 10, 20, 50, 100, 200, 500);
        }
    }
} 