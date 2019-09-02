<?php
session_start();
?>

<?php require 'header.php'?>
<main>
    <div class="main-form">       
        <div class="create-form-background">
            <div class="title-form">
                <h3>Inloggen</h3>
            </div>
            <form id="login-account-form" action="controllers/logincontroller.php" method="post">
                <label for="name">Gebruikersnaam</label>
                <input type="text" name="username" required="">
                <label for="players">Wachtwoord</label>
                <input type="password" name="password" required="">
                <input id="submit-team" type="submit" name="type" value="login">
            </form>
            <button id="forgot" onclick="window.location.href = 'submit-email.php';">Vergeten</button>
        </div>
    </div>
</main>
<?php require 'footer.php'?>

