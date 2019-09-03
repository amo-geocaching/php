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
    header("Location: cache-detail.php?=$cacheid");
}
else if(isset($_POST['rating']) && $_POST['rating'] <= 5 && $_POST['rating'] >= 0){
    $sql = "UPDATE logs SET rating = :rating WHERE cacheid = :cacheid";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':rating'   => $_POST['rating'],
        ':cacheid'  => $cacheid
    ]);
    header("Location: cache-detail.php?=$cacheid");
}
else if(isset($_POST['comment']) && strlen($_POST['comment']) <= 500){
    $sql = "UPDATE logs SET comment = :comment WHERE cacheid = :cacheid";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':comment'   => $_POST['comment'],
        ':cacheid'  => $cacheid
    ]);
    header("Location: cache-detail.php?=$cacheid");
}
else{
    echo 'Er is een fout opgetreden';
}