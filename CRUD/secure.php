<?php

session_start();

## This is the secure page. If the user is not logged in, they will be redirected to the login page.

if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
    header("location: /login.php");
    exit();
}


// if (!$_SESSION['auth']) {
//     header('location: /login.php');
//     exit();
// }