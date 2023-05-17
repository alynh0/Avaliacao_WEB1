<?php

require './secure.php';
$id = $_POST['id'];

$name = $_POST['name'];
$state = $_POST['state'];
$population = $_POST['population'];
$weather = $_POST['weather'];
$altitude = $_POST['altitude'];

$fp = fopen('cities.csv', 'r');
$temp = tempnam('.', '');
$tempFile = fopen($temp, 'w');

while (($row = fgetcsv($fp)) !== false) {
    if ($row[0] != $id) {
        fputcsv($tempFile, $row);
    } else {
        fputcsv($tempFile, [$name, $state, $population, $weather, $altitude]);
    }
}

fclose($fp);
fclose($tempFile);

rename($temp, 'cities.csv');
header('Location: index.php');
exit();
