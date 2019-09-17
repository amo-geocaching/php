<?php require 'header.php'?>
<main>
    <div class="detail-main">
        <div class="side">

        </div>
        <div class="middle">
            <div class="main-form">
                <div class="create-form-background">
                    <div class="title-form">
                        <h3>Registreren</h3>
                    </div>
                    <form id="create-account-form" class="login-register" action="controllers/logincontroller.php" method="post">
                        <label class="form-label" for="name">Gebruikersnaam</label>
                        <input type="text" name="username" required="">
                        <label class="form-label" for="players">Email</label>
                        <input type="text" name="email" required="">
                        <label class="form-label" for="players">Wachtwoord</label>
                        <input type="password" name="password" required="">
                        <label class="form-label" for="players">Wachtwoord Confirm</label>
                        <input type="password" name="passwordConfirm" required="">
                        <input class="loginbutton" id="submit" type="submit" value="Register">
                        <input type="hidden" name="type" value="register">
                    </form>
                </div>

            </div>
        </div>
        <div class="side">

        </div>
    </div>
</main>
<?php require 'footer.php'?>

