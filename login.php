<?php
require 'header.php'
?>

<main>
    <div class="detail-main">
        <div class="side">

        </div>
        <div class="middle">
            <div class="main-form">
                <div class="create-form-background">
                    <div class="title-form">
                        <h3>Login</h3>
                    </div>
                    <form id="login-account-form" class="login-register" action="controllers/logincontroller.php" method="post">
                        <label class="form-label" for="username">Gebruikersnaam</label>
                        <input type="text" name="username" required="" class="username">
                        <label class="form-label" for="password">Wachtwoord</label>
                        <input type="password" name="password" required="" class="password">
                        <input class="loginbutton"  id="submit-team" type="submit" value="Login">
                        <input type="hidden" name="type" value="login">
                    </form>
                    <button class="forgotbutton"  id="forgot" onclick="window.location.href = 'edit-account.php';">Wachtwoord vergeten?</button>
                </div>
            </div>
        </div>
        <div class="side">

        </div>
    </div>
</main>

<?php require 'footer.php'?>

