<?php
require 'header.php';
$sql = "SELECT * FROM users WHERE id = :id";
$prepare = $db->prepare($sql);
$prepare->execute([
    ':id' => $_SESSION['id']
]);
$user = $prepare->fetch(PDO::FETCH_ASSOC);
$sql = "SELECT * FROM caches WHERE cacheid = :cacheid  ";
$prepare= $db->prepare($sql);
$prepare->execute([
        ':cacheid' => $_GET['cacheid']
]);
$cache = $prepare->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">
    <div class="main-form">
        <div class="create-form-background">
            <div class="title-form">
                <h3>Edit cache </h3>
            </div>
                <div class="edit-cache">
                    <?php
                    if ($_SESSION['loggedin'] == true && $user['rank'] > 0)
                        ?><form action="controllers/cache-controller.php" method="post">
                        <input type="hidden" name="type" value="editcache">
                        <div class="form-group">
                            <label for="cachename">Cache Naam</label>
                            <input value="<?php echo $cache['cachename']?>" type="text" name="cachename" id="cachename">

                            <label for="description">Omschrijving</label>
                            <input value="<?php echo $cache['description']?>" type="text" name="description" id="description">

                            <label for="coordinateX">Breedtegraad</label>
                            <input value="<?php echo $cache['coordinateX']?>" type="text" name="coordinateX" id="coordinateX">

                            <label for="coordinateY">Lengtegraad</label>
                            <input value="<?php echo $cache['coordinateY']?>" type="text" name="coordinateY" id="coordinateY">

                            <label for="difficulty">Moeilijkheid</label>
                            <input value="<?php echo $cache['difficulty']?>" type="text" name="difficulty" id="difficulty">

                            <label for="properties">Eigenschappen</label>
                            <input value="<?php echo $cache['properties']?>" type="text" name="properties" id="properties">

                            <label for="tip">Tips</label>
                            <input value="<?php echo $cache['tip']?>" type="text" name="tip" id="tip">
                        </div>

                        <input type="submit" value="Edit Cache">
                    </form>
                </div>
            <button class="forgotbutton"  id="forgot"
                    onclick="window.location.href = 'submit-email.php';">Wachtwoord vergeten?
            </button>
        </div>
    </div>
</div>

<?php
require 'footer.php';
?>
