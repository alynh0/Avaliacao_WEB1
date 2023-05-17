<?php

require './secure.php';

$name = $_GET['name'];

$temp = tempnam('.', '');
$fp = fopen('cities.csv', 'r');
$tempFile = fopen($temp, 'w');

while (($row = fgetcsv($fp)) !== false) {
    if ($row[0] != $name) {
        fputcsv($tempFile, $row);
    }
}


fclose($fp);
fclose($tempFile);

rename($temp, 'cities.csv');
header('Location: ./index.php');
