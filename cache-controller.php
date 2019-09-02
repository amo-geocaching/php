<?php
/**
 * Created by PhpStorm.
 * User: timo0
 * Date: 2-9-2019
 * Time: 09:07
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require 'config.php';

$userid = $_SESSION['id'];
$cacheid = $_SESSION['cacheid'];
$logdate = date("Y/m/d");

if(isset($_POST['logcache'])){
    $sql = "INSERT INTO logs (cacheid, userid, logdate)
                       VALUES (:cacheid, :userid, :logdate)";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        'cacheid'   => $cacheid,
        'userid'    => $userid,
        'logdate'   => $logdate
    ]);
}
else{
    echo 'Er is een fout opgetreden';
}