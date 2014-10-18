<?php
/**
 * Created by PhpStorm.
 * User: *buntu
 * Date: 10/18/14
 * Time: 8:51 AM
 */
 namespace CsvParse\Config;

class Config {

    public $delimeter = ";";
    public $file_path = "";
    public function ValidateArgs($args)
    {
        if(sizeof($args)===1){
            die("Plese, specify in the argument of the path and file name\r\n");
        }
        else{
            $this->file_path = $args[1];
        }
        if(sizeof($args)===2){
            $this->delimeter=";";
        }
        else{
            $this->delimeter = $args[2];
        }
        echo "*******************************\r\n";
        echo "Reading file: ".$this->file_path."\r\n";
        echo "Delimeter: '".$this->delimeter."'\r\n";
        echo "*******************************\r\n";
        return $this;
    }

}