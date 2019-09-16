<?php
require 'header.php';
?>
<div class="container">
    <div class="main-form">
        <div class="create-form-background">
            <div class="title-form">
                <h3>Edit cache </h3>
            </div>
            <form action="controllers/cache-controller.php" method="post">
                <input type="hidden" value="edit">

                <input type="submit" value="">
            </form>
            <button class="forgotbutton"  id="forgot"
                    onclick="window.location.href = 'submit-email.php';">Wachtwoord vergeten?
            </button>
        </div>
    </div>
</div>

<?php
require 'footer.php';
?>
