<?php
/**
 * Created by PhpStorm.
 * User: timo0
 * Date: 29-8-2019
 * Time: 10:55
 */
require 'config.php';

$sql = "SELECT * FROM users WHERE id = :id";
$prepare = $db->prepare($sql);
$prepare->execute([
    ':id' => $_SESSION['id']
]);
$user = $prepare->fetch(PDO::FETCH_ASSOC);
$username = $user['username'];
$rank = $_SESSION['rank'];
$_SESSION['rankid'] = $user['rank'];

$sql = "SELECT caches.*, logs.userid, logs.isFound FROM caches INNER JOIN logs ON caches.cacheid = logs.cacheid WHERE logs.IsFound = true ";
$query = $db->query($sql);
$caches = $query->fetchAll(PDO::FETCH_ASSOC);
require 'header.php';

?>
<main>
    <div class="detail-main">
        <div class="side">

        </div>
        <div class="middle">
            <div class="account-info">
                <?php
                echo "<h2>$username</h2>";
                echo "<h3>$rank</h3>";
                ?>
                <h2>Gevonden caches:</h2>
                <ul>
                    <?php
                    foreach ($caches as $cache){
                        $cachename = $cache['cachename'];
                        echo "<li> <a href='cache-detail.php?cacheid={$cache ['cacheid']}'>$cachename</a></li>";

                    }
                    ?>
                </ul>
                <a href="edit-account.php?pass=<?php echo $user['password']?>}">Account aanpassen</a>

                <?php
                if ($_SESSION['loggedin'] == true && $user['rank'] > 0) {
                    echo "<a href='admin.php'> | Make Caches</a>";
                }
                ?>
            </div>
        </div>
        <div class="side">

        </div>
    </div>

</main>
<?php require 'footer.php'?>