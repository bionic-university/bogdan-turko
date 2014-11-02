<?php

    namespace Seller\Cache;

    /**
     * Class Cache
     * @package Seller\Cache
     */
    class Cache extends Currencies implements rentingCountInterface, validateInterface{

        private $curr = "";
        private $cur_curr = 0;
        private $refund_array = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

        /**
         * @return float
         */
        public function validateInput(){
            $f = fopen('php://stdin', 'r');
            $input = fgets($f, 10);
            fclose($f);
            $value = (float)$input;

            if($value < 1){
                throw new \InvalidArgumentException("Please input correct number!");
            }
            return $value;
        }

        /**
         * @param $currency
         * @return int
         */
        public function getRent( $currency ){

            $colors = new Coloring();

            echo $colors->getColoredString("Input payment amount: ", "green");
            $cost = $this->validateInput();

            echo $colors->getColoredString("Input amount of money received: ", "green");
            $pay = $this->validateInput();

            if($pay < $cost){
                throw new \InvalidArgumentException("'Amount of Money' must be greater or equal to 'Payment Amount'!");
            }

            $refund = $pay - $cost;
            $result = "";
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
                    $result .= $this->curr[$key]." -> x".$value.PHP_EOL;
                }
            }

            return $result;
        }

    }