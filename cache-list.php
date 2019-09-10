<?php
require 'header.php';

$sql = "SELECT caches.*, logs.userid FROM caches LEFT JOIN logs ON caches.cacheid = logs.cacheid";
$query = $db->query($sql);
$caches = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<ul>
<?php
foreach ($caches as $cache){
    $found = "";
    if(isset($cache['userid'])){
        $found = "Gevonden: ";
    }
    $cachename = $cache['cachename'];
    echo "<li> <a href='cache-detail.php?cacheid={$cache ['cacheid']}'>$found $cachename</a></li>";

}
?>
</ul>



<?php require 'footer.php';
