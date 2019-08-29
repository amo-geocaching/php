<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>FIFA-project</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">

    <meta name="theme-color" content="#fafafa">
</head>

<body>
<?php require 'header.php'?>
<main>
    <div class="main-form">
        <div class="create-form-background">
                <div class="title-form">
                <h3>Registreren</h3>
            </div>
            <form id="create-account-form" action="controllers/logincontroller.php" method="post">
                <label for="name">Gebruikersnaam</label>
                <input type="text" name="username" required="">
                <label for="players">Email</label>
                <input type="text" name="email" required="">
                <label for="players">Wachtwoord</label>
                <input type="password" name="password" required="">
                <label for="players">Wachtwoord Confirm</label>
                <input type="password" name="passwordConfirm" required="">
                <input id="submit" type="submit" name="type" value="register">
            </form>
        </div>
        
    </div>
</main>
<?php require 'footer.php'?>

