<?php
/**
 * Created by PhpStorm.
 * User: timo0
 * Date: 29-8-2019
 * Time: 11:49
 */
require 'header.php'
?>
    <main>
        <div class="main-edit">
            <h2>Vul hieronder je email in om je account aan te passen.</h2>
            <form id="login-account-form" action="controllers/edit-controller.php" method="post">
                <label for="name">Email</label>
                <input type="email" name="email" required="">
                <input id="submit-email" type="submit" value="edit">
            </form>
        </div>

    </main>

<?php require 'footer.php' ?>