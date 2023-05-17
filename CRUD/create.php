<?php

require './secure.php';

$name = $_POST['name'];
$state = $_POST['state'];
$population = $_POST['population'];
$weather = $_POST['weather'];
$altitude = $_POST['altitude'];

$fp = fopen('cities.csv', 'r');

while (($row = fgetcsv($fp)) !== false) {
    if ($row[0] == $name) {
        header('Location: ./index.php?error=exists');
        exit();
    }
}

$fp = fopen('cities.csv', 'a');

fputcsv($fp, [$name, $state, $population, $weather, $altitude]);
header('Location: ./index.php');
