<?php
require 'config.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style/style.css">
    <title>Geocaching</title>
</head>
<body>
    <header>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="maps.php">Map</a></li>
            <?php
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                echo "<li><a href='account.php'>Account</a></li>";
                echo "<li><a href='controllers/logoutcontroller.php'>Logout</a></li>";
            }
            else{
                echo "<li><a href='login.php'>Login</a></li>";
                echo "<li><a href='register.php'>Register</a></li>";
            }

            ?>
        </ul>

    </header>

