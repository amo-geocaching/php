<?php
/**
 * Created by PhpStorm.
 * User: timo0
 * Date: 2-9-2019
 * Time: 09:00
 */

require 'header.php';

$_SESSION['cacheid'] = $_GET['id'];

$sql = "SELECT * FROM logs WHERE userid = :userid";
$prepare = $db->prepare($sql);
$prepare->execute([
    ':userid' => $_SESSION['id']
]);
$cacheinfo = $prepare->fetch(PDO::FETCH_ASSOC);
$logdate = $cacheinfo['logdate'];
?>
<main>
    <?php
    if (!isset($cacheinfo)){?>
        <form action="cache-controller.php" method="post">
            <input type="hidden" name="logcache" value="1">
            <input id="submit" type="submit" value="Log">
        </form>
    <?php
    }
    else{
        echo "<p>Je hebt deze cache gelogt op $logdate</p>";
    }?>

</main>
<?php require 'footer.php';
