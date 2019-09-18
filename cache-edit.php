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
<main>
    <div class="detail-main">
        <div class="side">

        </div>
        <div class="middle">
            <div class="main-form">
                <div class="create-form-background">
                    <div class="title-form">
                        <h3>Edit cache </h3>
                    </div>
                    <div class="edit-cache">
                        <?php
                        if ($_SESSION['loggedin'] == true && $user['rank'] > 0)
                        ?><form action="controllers/cache-controller.php" class="login-register" method="post">
                            <input type="hidden" name="type" value="editcache">
                            <div class="form-groups">
                                <div class="form-group">
                                    <label for="cachename">Cache Naam:</label>
                                    <input value="<?php echo $cache['cachename']?>" type="text" name="cachename" id="cachename">
                                </div>
                                <div class="form-group">
                                    <label for="description">Omschrijving:</label>
                                    <input value="<?php echo $cache['description']?>" type="text" name="description" id="description">
                                </div>
                                <div class="form-group">
                                    <label for="coordinateX">Lengtegraad:</label>
                                    <input value="<?php echo $cache['coordinateX']?>" type="text" name="coordinateX" id="coordinateX">
                                </div>
                                <div class="form-group">
                                    <label for="coordinateY">Breedtegraad:</label>
                                    <input value="<?php echo $cache['coordinateY']?>" type="text" name="coordinateY" id="coordinateY">
                                </div>
                                <div class="form-group">
                                    <label for="difficulty">Moeilijkheid:</label>
                                    <input value="<?php echo $cache['difficulty']?>" type="text" name="difficulty" id="difficulty">
                                </div>
                                <div class="form-group">
                                    <label for="properties">Eigenschappen:</label>
                                    <input value="<?php echo $cache['properties']?>" type="text" name="properties" id="properties">
                                </div>
                                <div class="form-group">
                                    <label for="tip">Tips:</label>
                                    <input value="<?php echo $cache['tip']?>" type="text" name="tip" id="tip">
                                </div>
                            </div>
                            <input class="add-cache-button" type="submit" value="Edit Cache">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="side">

        </div>
    </div>
</main>


<?php
require 'footer.php';
?>
