<?php
/**
 * Created by PhpStorm.
 * User: *buntu
 * Date: 10/18/14
 * Time: 8:51 AM
 */
 namespace CsvParse\Shows;

class Shows
{
    public function printCsv($mas)
    {
        for ($j=0; $j<count($mas); $j++){

            for ($k=0; $k<count($mas[$j]); $k++) {
                print $mas[$j][$k]." ";
            }
            echo PHP_EOL;
        }
    }
}
