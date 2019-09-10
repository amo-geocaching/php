<?php
require 'header.php'
?>
<div class="container">
    <div class="main-form">       
        <div class="create-form-background">
            <div class="title-form">
                <h3>Login</h3>
            </div>
            <form id="login-account-form" action="controllers/logincontroller.php" method="post">
                <label class="UserLabel" for="username">Gebruikersnaam</label>
                <input type="text" name="username" required="" class="username">
                <label class="PassLabel" for="password">Wachtwoord</label>
                <input type="password" name="password" required="" class="password">
                <input class="loginbutton"  id="submit-team" type="submit" name="type" value="login">
            </form>
            <button class="forgotbutton"  id="forgot" onclick="window.location.href = 'submit-email.php';">Wachtwoord vergeten?</button>
        </div>
    </div>
</div>
<?php require 'footer.php'?>

