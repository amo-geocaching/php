<?php
require 'config.php';
$pass = $_GET['pass'];
$_SESSION['pass'] = $pass;

$sql = "SELECT * FROM users WHERE password = :password";
$prepare = $db->prepare($sql);
$prepare->execute([
        ':password' => $pass
]);
$result = $prepare->fetch(PDO::FETCH_ASSOC);

if(isset($result)){

require 'header.php';?>
<main>
    <div class="detail-main">
        <div class="side">

        </div>
        <div class="middle">
            <div class="main-form">
                <div class="create-form-background">
                    <div class="title-form">
                        <h3>Account aanpassen</h3>
                    </div>
                    <form class="login-register" id="create-account-form" action="controllers/newaccount-controller.php" method="post">
                        <div class="form-groups">
                            <div class="form-group">
                                <label for="name">Nieuwe Gebruikersnaam:</label>
                                <input type="text" name="username" required="">
                            </div>
                            <div class="form-group">
                                <label for="players">Nieuwe Wachtwoord:</label>
                                <input type="password" name="password" required="">
                            </div>
                            <div class="form-group">
                                <label for="players">Wachtwoord Confirm:</label>
                                <input type="password" name="passwordConfirm" required="">
                            </div>

                        </div>
                        <input id="submit" type="hidden" name="type" value="edit">
                        <input class="editbutton" type="submit" id="submit" value="Edit">
                    </form>
                </div>
            </div>
        </div>
        <div class="side">

        </div>
    </div>

</main>
<?php require 'footer.php';
}?>