<?php
session_start();
require 'header.php'
?>
<div class="container">
    <div class="main-form">       
        <div class="create-form-background">
            <div class="title-form">
                <h3>Login</h3>
            </div>
            <form id="login-account-form" action="controllers/logincontroller.php" method="post">
                <label for="username">Gebruikersnaam</label>
                <input type="text" name="username" required="" class="username">
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" required="" class="password">
                <input id="submit-team" type="submit" name="type" value="login">
            </form>
            <button id="forgot" onclick="window.location.href = 'submit-email.php';">Vergeten</button>
        </div>
    </div>
</div>
<?php require 'footer.php'?>

