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
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">
    <title>Geocaching</title>
</head>
<body>
    <header>
        <div class="navbar">
            <nav>
                <ul>
                    <li><a href="index.php" class="home">Home</a></li>
                    <li><a href="maps.php" class="maps">Map</a></li>
                    <li><a href="informatie.php" class="info">Info</a></li>
                    <li><a href="cache-list.php" class="cache">Caches</a></li>
                </ul>
                <select class="select" name="dropdown" onchange="location = this.value;"><option value="index.php">Home</option>
                    <option value="" selected disabled hidden>Pagina</option>
                    <option value="maps.php">Maps</option>
                    <option value="informatie.php">Info</option>
                    <option value="cache-list.php">Caches</option>
                </select>
            </nav>
            <div class="login">
                <ul>
                    <?php
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                        echo "<li><a href='account.php' class='login-button'>Account</a></li>";
                        echo "<li><button class='login-button'  id=\"logout\" onclick=\"window.location.href = './controllers/logoutcontroller.php';\">Logout</button></li>";
                    }
                    else{
                        echo "<li><button class='login-button'  id=\"login\" onclick=\"window.location.href = 'login.php';\">Login</button></li>";
                        echo "<li><a href='register.php' class='login-button'>Register</a></li>";
                    }
                    ?>
                </ul
            </div>

        </div>

    </header>

