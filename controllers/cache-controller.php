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
require '../config.php';

$userid = $_SESSION['id'];
$cacheid = $_SESSION['cacheid'];
$logdate = date("Y/m/d");

if(isset($_POST['logcache'])){
    $sql = "INSERT INTO logs (cacheid, userid, logdate, isFound)
                       VALUES (:cacheid, :userid, :logdate, :isFound)";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        'cacheid'   => $cacheid,
        'userid'    => $userid,
        'logdate'   => $logdate,
        'isFound'   => $_POST['found']
    ]);
    header("Location: ../cache-detail.php?cacheid=$cacheid");
}
else if(isset($_POST['rating']) && $_POST['rating'] <= 5 && $_POST['rating'] >= 0 && is_numeric($_POST['rating'])){
    $sql = "UPDATE logs SET rating = :rating WHERE cacheid = :cacheid AND userid = :userid";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':rating'   => $_POST['rating'],
        ':cacheid'  => $cacheid,
        ':userid'   => $userid
    ]);
    //calculate rating and update new cache rating
    $sql = "SELECT rating FROM logs WHERE cacheid = :cacheid";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':cacheid'  => $cacheid
    ]);
    $rating = $prepare->fetchAll(PDO::FETCH_ASSOC);
    $totalRating = 0;
    foreach($rating as $rate){
        $totalRating += $rate['rating'];
    }

    $newRating = $totalRating / count($rating);
    var_dump($rating);
    $sql = "UPDATE caches SET rating = :rating WHERE cacheid = :cacheid";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':rating'   => $newRating,
        ':cacheid'  => $cacheid
    ]);

    header("Location: ../cache-detail.php?cacheid=$cacheid");
}
else if(isset($_POST['comment']) && strlen($_POST['comment']) <= 500){
    $sql = "UPDATE logs SET comment = :comment WHERE cacheid = :cacheid";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':comment'   => $_POST['comment'],
        ':cacheid'  => $cacheid
    ]);
    header("Location: ../cache-detail.php?cacheid=$cacheid");
}
else if ($_POST['type'] === 'delete') {
    $cacheid = $_SESSION['cacheid'];
    $sql = "DELETE FROM caches WHERE cacheid= :cacheid";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':cacheid' => $cacheid
    ]);

    $msg = "Cache is succesvol verwijderd!";

    header("location: ../index.php?msg=$msg");
    exit;
}

else if ($_POST['type'] === 'editcache') {
    $cachename      = $_POST['cachename'];
    $description    = $_POST['description'];
    $coordinateX    = $_POST['coordinateX'];
    $coordinateY    = $_POST['coordinateY'];
    $difficulty     = $_POST['difficulty'];
    $properties     = $_POST['properties'];
    $tip    = $_POST['tip'];
    $cacheid     = $_SESSION['cacheid'];

    $sql = "UPDATE caches SET 
    cachename= :cachename, 
    description= :description, 
    coordinateX= :coordinateX, 
    coordinateY= :coordinateY, 
    difficulty= :difficulty, 
    properties= :properties, 
    tip= :tip WHERE cacheid= :cacheid";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':cachename'    => $cachename,
        ':description'  => $description,
        ':coordinateX'  => $coordinateX,
        ':coordinateY'  => $coordinateY,
        ':difficulty'   => $difficulty,
        ':properties'   => $properties,
        ':tip'  => $tip,
        ':cacheid' => $cacheid
    ]);

    $msg = "Cache is gewijzigd!";

    header("location: ../maps.php?msg=$msg");
    exit;
}

else{
    echo 'Er is een fout opgetreden';
}

