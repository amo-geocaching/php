<?php
/**
 * Created by PhpStorm.
 * User: timo0
 * Date: 2-9-2019
 * Time: 09:00
 */

require 'header.php';

$_SESSION['cacheid'] = $_GET['cacheid'];

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
    if ($cacheinfo == false){?>
        <form action="cache-controller.php" method="post">
            <input type="hidden" name="logcache" value="1">
            <input id="submit" type="submit" value="Log">
        </form>
    <?php
    }
    else{
        echo "<h3>Je hebt deze cache gelogt op $logdate</h3>";
        ?>
        <form action="cache-controller.php" method="post">
            <input type="number" min="0" max="5" name="rating">
            <input id="submit" type="submit" value="Log">
        </form>
        <form action="cache-controller.php" method="post">
            <input type="text" maxlength="500" name="comment">
            <input id="submit" type="submit" value="Log">
        </form>
        <?php
    }?>

</main>
<?php require 'footer.php';
