<?php
/**
 * Created by PhpStorm.
 * User: *buntu
 * Date: 10/17/14
 * Time: 08:22 AM
 */
    include 'vendor/autoload.php';
    use CsvParse\Config\Config;
    use CsvParse\Parse\Parse;
    use CsvParse\Shows\Shows;

    $config = new Config;
    $csv = new Parse;
    $sh = new Shows;

    $params = $config->ValidateArgs($argv);

    echo "*******************************\r\n";
    echo "Reading file: ".$params->file_path."\r\n";
    echo "Delimeter: '".$params->delimeter."'\r\n";
    echo "*******************************\r\n";

    $mas = $csv->readFile($params->file_path, $params->delimeter);

    $sh->showCsv($mas);

?>