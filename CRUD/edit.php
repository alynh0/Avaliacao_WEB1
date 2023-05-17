<?php

require './secure.php';

$name = $_GET['name'];

$fp = fopen('cities.csv', 'r');

$founded = false;
$data = null;

while (($row = fgetcsv($fp)) !== false) {
    if ($row[0] == $name) {
        $founded = true;
        $data = $row;
    }
}

if (!$founded) {
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Atualizar os dados da cidade</h1>
    <h2>Cidade: <?= $data[0] ?></h2>
    <h2>Estado: <?= $data[1] ?></h2>
    <h2>População: <?= $data[2] ?></h2>
    <h2>Clima: <?= $data[3] ?></h2>
    <h2>Altitude: <?= $data[4] ?></h2>

    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $data[0] ?>">

        <label for="name">Nome</label>
        <input type="text" name="name" id="name" value="<?= $data[0] ?>" required>

        <label for="state">Estado</label>
        <input type="text" name="state" id="state" value="<?= $data[1] ?>" required>

        <label for="population">População</label>
        <input type="number" name="population" id="population" value="<?= $data[2] ?>" required>

        <label for="weather">Clima</label>
        <select name="weather" id="weather" required>
            <option value="Tropical" <?= $data[3] == 'Tropical' ? "selected" : "" ?>>Tropical</option>
            <option value="Temperado" <?= $data[3] == 'Temperado' ? "selected" : "" ?>>Temperado</option>
            <option value="Frio" <?= $data[3] == 'Frio' ? "selected" : "" ?>>Frio</option>
        </select>
        
        <label for="altitude">Altitude (m)</label>
        <input type="number" name="altitude" id="altitude" value="<?= $data[4] ?>" required>

        <button>Save</button>
    </form>
</body>

</html>