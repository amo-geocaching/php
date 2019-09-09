<?php
require 'header.php';

$sql = "SELECT * FROM caches";
$query = $db->query($sql);
$caches = $query->fetchAll(PDO::FETCH_ASSOC);


?>
<ul>
<?php
foreach ($caches as $cache){

    $cachename = $cache['cachename'];
    echo "<li> <a href='cache-detail.php?cacheid={$cache ['cacheid']}'>$cachename</a></li>";

}
?>
</ul>



<?php require 'footer.php';
