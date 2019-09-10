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
                <li><a href="maps.php" class="maps">Map</a></li>
                <li><a href="informatie.php" class="info">Informatie</a></li>
                <li><a href="cache-list.php" class="cache">Caches</a></li>
                <?php
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                    echo "<li><a href='account.php' class='register'>Account</a></li>";
                    echo "<button class=\"login-button\"  id=\"logout\" onclick=\"window.location.href = './controllers/logoutcontroller.php';\">Logout</button>";
                }
                else{
                    echo "<button class=\"login-button\"  id=\"login\" onclick=\"window.location.href = 'login.php';\">Login</button>";
                    echo "<li><a href='register.php' class='register'>Register</a></li>";
                }
                ?>
            </ul
        </div>

    </header>

