<?php

require './secure.php';
$fp = fopen('cities.csv', 'r');

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
    <a href="../logout.php" id="btn_logout">Logout</a>
    <h1>Registro de Cidades</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Estado</th>
            <th>População</th>
            <th>Clima</th>
            <th>Altitude (m)</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        <?php while (($row = fgetcsv($fp)) !== false) : ?>
        <tr>
            <td><?= $row[0] ?></td>
            <td><?= $row[1] ?></td>
            <td><?= $row[2] ?></td>
            <td><?= $row[3] ?></td>
            <td><?= $row[4] ?></td>
            <td><a href="delete.php?name=<?= $row[0] ?>">Delete</a></td>
            <td><a href="edit.php?name=<?= $row[0] ?>">Edit</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <form action="create.php" method="post">
        <!-- Error message -->
        <?php if (isset($_GET['error']))
            if ($_GET['error'] == 'exists') : ?>
        <p class="error">Essa cidade já está registrada</p>
        <?php endif;
        ?>

        <!-- Form -->
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" required>

        <label for="state">Estado</label>
        <input type="text" name="state" id="state" required>

        <label for="population">População</label>
        <input type="number" name="population" id="population" required>
        
        <label for="weather">Clima</label>
        <select name="weather" id="weather" required>
            <option value="Tropical">Tropical</option>
            <option value="Temperado">Temperado</option>
            <option value="Frio">Frio</option>
        </select>

        <label for="altitude">Altitude (M)</label>
        <input type="number" name="altitude" id="altitude">

        <button>Create</button>
    </form>
</body>

</html>