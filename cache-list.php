<?php
require 'header.php';

$sql = "SELECT caches.*, logs.userid, logs.isFound FROM caches LEFT JOIN logs ON caches.cacheid = logs.cacheid";
$query = $db->query($sql);
$caches = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<main>
    <div class="detail-main">
        <div class="side">

        </div>
        <div class="middle">
            <ul class="cachelist">
                <?php
                foreach ($caches as $cache){
                    $found = "";
                    if(isset($cache['userid']) && $cache['isFound'] == true){
                        $found = "Gevonden: ";
                    }
                    else if(isset($cache['userid']) && $cache['isFound'] == false){
                        $found = "Niet gevonden: ";
                    }
                    else{
                        $found = "";
                    }
                    $cachename = $cache['cachename'];
                    echo "<li class='cache'> <a href='cache-detail.php?cacheid={$cache ['cacheid']}'>$found $cachename</a></li>";

                }
                ?>
            </ul>
        </div>
        <div class="side">

        </div>
    </div>

</main>

<?php require 'footer.php';
