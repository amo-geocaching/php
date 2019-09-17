<?php
/**
 * Created by PhpStorm.
 * User: timo0
 * Date: 2-9-2019
 * Time: 09:00
 */

require 'header.php';
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
$_SESSION['cacheid'] = $_GET['cacheid'];

$sql = "SELECT * FROM caches WHERE cacheid = :cacheid";
$prepare = $db->prepare($sql);
$prepare->execute([
    ':cacheid' => $_GET['cacheid']
]);
$caches = $prepare->fetch(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM logs WHERE userid = :userid AND cacheid = :cacheid";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':userid' => $_SESSION['id'],
        ':cacheid' => $_GET['cacheid']
    ]);
    $cacheinfo = $prepare->fetch(PDO::FETCH_ASSOC);
    $logdate = $cacheinfo['logdate'];
    ?>
    <main>
        <div class="detail-main">
            <div class="side">

            </div>
            <div class="middle">
                <div class="detail-info">
                    <?php
                    $cachename = $caches['cachename'];
                    $rating = $caches['rating'];
                    $description = $caches['description'];
                    $properties = $caches['properties'];
                    $tip = $caches['tip'];

                    echo "<h1>$cachename</h1>";
                    echo "<p>$rating</p>";
                    echo "<p>$description</p>";
                    echo "<p>Eigenschappen: $properties</p>";
                    echo "<p>Tip: $tip</p>";
                    ?>
                </div>
                <div class="detail-logging">
                    <?php
                    if(isset($caches['cacheid'])){
                        if ($cacheinfo == false){?>
                            <form action="controllers/cache-controller.php" method="post">
                                <input type="hidden" name="logcache" value="1">
                                <input type="hidden" name="found" value="1">
                                <input id="submit" type="submit" value="Gevonden">
                            </form>
                            <form action="controllers/cache-controller.php" method="post">
                                <input type="hidden" name="logcache" value="1">
                                <input type="hidden" name="found" value="0">
                                <input id="submit" type="submit" value="Niet gevonden">
                            </form>

                            <?php
                            if ( $_SESSION['loggedin'] == true ) {
                                ?>
                                <form action="controllers/cache-controller.php" method="post">
                                    <input type="hidden" name="type" value="delete">
                                    <input type="submit" value="Delete this Cache">
                                </form>
                                <?php
                            }
                            if ($_SESSION['loggedin'] == true ){
                                ?>
                                <button class=""  id="edit" onclick="window.location.href = 'cache-edit.php?cacheid=<?php echo $caches['cacheid'] ?>';">Edit cache</button>
                                <?php
                            }
                            ?>

                            <?php
                        }
                        else {
                            echo "<h3>Je hebt deze cache gelogt op $logdate</h3>";
                            ?>
                            <form action="controllers/cache-controller.php" method="post">
                                <input type="number" min="0" max="5" name="rating">
                                <input id="submit" type="submit" value="Rate">
                            </form>
                            <form action="controllers/cache-controller.php" method="post">
                                <input type="text" maxlength="500" name="comment">
                                <input id="submit" type="submit" value="Comment">
                            </form>

                            <?php
                        }
                    }else{
                        echo 'Deze cache bestaat niet!';
                    }?>

                </div>
            </div>
            <div class="side">
            </div>
        </div>
    </main>
<?php }else {
    ?>
    <style>
        main{
            min-height: 100vh;
        }
        .middle a{
            font-size: 1.5em;
            text-align: center;
            margin: 10%;
        }
    </style>
    <main>
        <div class="detail-main">
            <div class="side">

            </div>
            <div class="middle">
                <a href="login.php">Je moet eerst inloggen om deze pagina te zien!</a>
            </div>
            <div class="side">

            </div>
        </div>
    </main>
<?php
}
require 'footer.php';
