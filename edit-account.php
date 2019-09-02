<?php
/**
 * Created by PhpStorm.
 * User: timo0
 * Date: 29-8-2019
 * Time: 12:18
 */


require 'header.php'?>
<main>
    <div class="main-form">
        <div class="create-form-background">
                <div class="title-form">
                <h3>Account aanpassen</h3>
            </div>
            <form id="create-account-form" action="controllers/logincontroller.php" method="post">
                <label for="name">Nieuwe Gebruikersnaam</label>
                <input type="text" name="username" required="">
                <label for="players">Nieuwe Wachtwoord</label>
                <input type="password" name="password" required="">
                <label for="players">Wachtwoord Confirm</label>
                <input type="password" name="passwordConfirm" required="">
                <input id="submit" type="submit" name="type" value="register">
            </form>
        </div>

    </div>
</main>
<?php require 'footer.php'?>