<?php
/**
 * Created by PhpStorm.
 * User: *buntu
 * Date: 10/27/14
 * Time: 2:03 PM
 */

    namespace Seller\Cache;

    class Cache implements rentingCountInterface{
        private $curr = array(1, 2, 5, 10, 20, 50, 100, 200, 500);
        private $cur_curr = 0;
        private $refund_array = array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        public function getRent($cost, $pay){
            $refund = $pay - $cost;
            $result = 0;
            $this->cur_curr = count($this->curr)-1;

            //var_dump($this->cur_curr);

            //print_r($this->curr[$this->cur_curr]);

            while($this->cur_curr > -1){
                $val = $this->curr[$this->cur_curr];
                while(($refund - $val) >= 0){
                    $refund = $refund - $val;
                    $this->refund_array[$this->cur_curr]++;
                }
                $this->cur_curr--;
            }

            foreach($this->refund_array as $key => $value){
                if($value > 0) {
                    echo $this->curr[$key]." -> x".$value.PHP_EOL;
                }
            }

            return $result;
        }

    }