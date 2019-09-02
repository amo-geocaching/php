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
    <link rel="stylesheet" href="./style/main.css">
    <link rel="stylesheet" href="./style/normalize.css">
    <title>Geocaching</title>
</head>
<body>
    <header>
        <div class="navbar">
            <ul>
                <li><a href="index.php" class="home">Home</a></li>
                <li><a href="maps.php" class="maps">Kaart</a></li>
                <li><a href="information.php" class="info">Info</a></li>
                <?php
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                    echo "<li><a href='account.php'>Account</a></li>";
                    echo "<li><a href='controllers/logoutcontroller.php'>Logout</a></li>";
                }
                else{
                    echo "<li><a href='login.php' class='login'>Login</a></li>";
                    echo "<li><a href='register.php'>Register</a></li>";
                }

                ?>
            </ul>
        </div>

    </header>

