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

require 'header.php';

?>
<body>
<main>
<?php
echo "<h2>$username</h2>";
echo "<h3>$rank</h3>";
?>
    <a href="submit-email.php">Account aanpassen</a>
</main>
</body>
<?php require 'footer.php'?>