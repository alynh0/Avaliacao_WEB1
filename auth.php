<?php

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$response = file_get_contents("http://localhost:7070/getData.php");
$data = json_decode($response, true);

foreach ($data as $user) {
    if ($user['username'] == $username && $user['password'] == $password) {
        $_SESSION['auth'] = true;
        header('location: CRUD/index.php');
        exit();
    }
}

header('location: login.php');
$_SESSION['auth'] = false;
exit();
