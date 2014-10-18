<?php
/**
 * Created by PhpStorm.
 * User: *buntu
 * Date: 10/18/14
 * Time: 8:51 AM
 */
 namespace CsvParse\Parse;

class Parse {

    public $max_content_len = 1000;
    public function readFile($file_path, $delimeter)
    {
        try{
            $f = fopen( $file_path, "rt") or die("Error reading file!");

            for ($i=0; $data=fgetcsv($f, $this->max_content_len, $delimeter); $i++) {

                $mas[$i] = $data;
                //var_dump($mas[$i]);
            }
            fclose($f);
        }
        catch (Exception $e) {
            echo "Error reading file!";
        }
        return $mas;
    }

}