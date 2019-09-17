<?php
/**
 * Created by PhpStorm.
 * User: timo0
 * Date: 2-9-2019
 * Time: 09:00
 */

require 'header.php';
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    ?>
    <style>
        main {
            min-height: 100vh;
        }

        .middle a {
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
} else {
    $_SESSION['cacheid'] = $_GET['cacheid'];

    $sql = "SELECT caches.*, logs.comment, logs.isFound, logs.rating, users.username
          FROM caches      
          LEFT JOIN logs ON logs.cacheid = caches.cacheid
          LEFT JOIN users ON users.id = logs.userid
          WHERE caches.cacheid = :cacheid;";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':cacheid' => $_GET['cacheid']
    ]);
    $caches = $prepare->fetchAll(PDO::FETCH_ASSOC);
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
                    $cachename = $caches[0]['cachename'];
                    $rating = $caches[0]['rating'];
                    $description = $caches[0]['description'];
                    $properties = $caches[0]['properties'];
                    $tip = $caches[0]['tip'];

                    echo "<h1>$cachename</h1>";
                    echo "<p>$rating</p>";
                    echo "<p>$description</p>";
                    echo "<p>Eigenschappen: $properties</p>";
                    echo "<p>Tip: $tip</p>";
                    ?>
                </div>
                <div class="detail-logging">
                    <?php
                    if (isset($caches[0]['cacheid'])) {
                        if ($cacheinfo == false) {
                            ?>
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
                        } else {
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
                    } else {
                        echo 'Deze cache bestaat niet!';
                    } ?>
                    <?php
                    if ($_SESSION['loggedin'] == true) {
                        ?>
                        <form action="controllers/cache-controller.php" method="post">
                            <input type="hidden" name="type" value="delete">
                            <input type="submit" value="Delete this Cache">
                        </form>
                        <button class="" id="edit"
                                onclick="window.location.href = 'cache-edit.php?cacheid=<?php echo $caches[0]['cacheid'] ?>';">
                            Edit cache
                        </button>

                    <h2>Comments:</h2>
                            <?php
                            foreach ($caches as $cache) {
                                if($cache['comment'] != ""){?>
                                <div class="comment">
                                    <div class="namebox">
                                        <h3><?php echo $cache['username'] ?></h3>
                                        <p>
                                            <?php

                                            if(isset($cache['rating'])){
                                                $rated = ' | ' . $cache['rating'];
                                            }
                                            else{
                                                $rated = '';
                                            }

                                            if($cache['isFound'] == true){
                                                echo $rated . ' | Gevonden';
                                            }
                                            else{
                                                echo $rated . ' | Niet gevonden';
                                            }
                                            ?>
                                        </p>
                                    </div>
                                    <p>"<?php echo $cache['comment'] ?>"</p>
                                </div>
                            <?php
                                    }
                                }
                            }?>

                </div>
            </div>
            <div class="side">
            </div>
        </div>
    </main>
    <?php
}
require 'footer.php';

