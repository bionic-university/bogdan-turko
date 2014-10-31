<?php
/**
 * Created by PhpStorm.
 * User: *buntu
 * Date: 10/27/14
 * Time: 2:03 PM
 */

    namespace Seller\Cache;

    class Cache extends Currencies implements rentingCountInterface, validateInterface{

        private $curr = "";
        private $cur_curr = 0;
        private $refund_array = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

        public function validateInput(){
            $colors = new Coloring();
            $f = fopen('php://stdin', 'r');
            $input = fgets($f, 10);
            fclose($f);
            $value = (float)$input;

            if($value > 1){
            }
            else{
                echo $colors->getColoredString("Please input correct number!", "red").PHP_EOL; die;
            }
            return $value;
        }
        public function getRent( $currency){


            $colors = new Coloring();

            echo $colors->getColoredString("Input payment amount: ", "green");
            $cost = $this->validateInput();




            echo $colors->getColoredString("Input amount of money received: ", "green");
            $pay = $this->validateInput();
            /*$f = fopen('php://stdin', 'r');
            $input = fgets($f, 10);
            fclose($f);
            $pay = (float)$input;

            if($cost > 1){

            }
            else{
                echo $colors->getColoredString("Please input correct number!", "red").PHP_EOL; die;
            }*/


            $refund = $pay - $cost;
            $result = 0;
            $this->curr = $this->getCurrency($currency);
            $this->cur_curr = count($this->curr)-1;

            while($this->cur_curr > -1){
                $val = $this->curr[$this->cur_curr];
                while(($refund - $val) >= 0){
                    $refund = $refund - $val;
                    $this->refund_array[$this->cur_curr]++;
                }
                $this->cur_curr--;
            }

            echo $colors->getColoredString("Result: ", "brown").PHP_EOL;
            foreach($this->refund_array as $key => $value){
                if($value > 0) {
                    echo $this->curr[$key]." -> x".$value.PHP_EOL;
                }
            }


            return $result;
        }

    }