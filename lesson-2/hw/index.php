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

    $params = $config->validateArgs($argv);

    echo "*******************************". PHP_EOL;
    echo "Reading file: ".$params->file_path . PHP_EOL;
    echo "Delimeter: '".$params->delimeter . PHP_EOL;
    echo "*******************************" . PHP_EOL;

    $mas = $csv->readFile($params->file_path, $params->delimeter);

    $sh->printCsv($mas);

