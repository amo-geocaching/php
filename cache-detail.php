<?php
/**
 * Created by PhpStorm.
 * User: timo0
 * Date: 2-9-2019
 * Time: 09:00
 */

require 'header.php';
if($_SESSION['loggedin'] == true){
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
        <?php
        if(isset($caches['cacheid'])){
            if ($cacheinfo == false){?>
                <form action="controllers/cache-controller.php" method="post">
                    <input type="hidden" name="logcache" value="1">
                    <input id="submit" type="submit" value="Log">
                </form>
                <?php
            }
            else {
                echo "<h3>Je hebt deze cache gelogt op $logdate</h3>";
                ?>
                <form action="controllers/cache-controller.php" method="post">
                    <input type="number" min="0" max="5" name="rating">
                    <input id="submit" type="submit" value="Log">
                </form>
                <form action="controllers/cache-controller.php" method="post">
                    <input type="text" maxlength="500" name="comment">
                    <input id="submit" type="submit" value="Log">
                </form>
                <?php
            }
        }else{
            echo 'Deze cache bestaat niet!';
        }?>



    </main>

<?php }else if($_SESSION['loggedin'] == false){
    echo 'Je moet eerst inloggen om caches te kunnen zien';
}
require 'footer.php';
