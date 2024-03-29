<?php


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require '../config.php';

if ($_POST['type'] === 'createcache') {
    if($_SESSION['rankid'] > 0){
        $cachename      = $_POST['cachename'];
        $description    = $_POST['description'];
        $coordinateX    = $_POST['coordinateX'];
        $coordinateY    = $_POST['coordinateY'];
        $difficulty     = $_POST['difficulty'];
        $properties     = $_POST['properties'];
        $tip            = $_POST['tip'];

        $sql = "INSERT INTO caches (cachename, description, coordinateX, coordinateY, difficulty, properties, tip) 
            VALUES (:cachename, :description, :coordinateX, :coordinateY, :difficulty, :properties, :tip)";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':cachename'    => $cachename,
            ':description'  => $description,
            ':coordinateX'  => $coordinateX,
            ':coordinateY'  => $coordinateY,
            ':difficulty'   => $difficulty,
            ':properties'   => $properties,
            ':tip'          => $tip

        ]);

        $msg = "Cache is succesvol aangemaakt!";

        header("location: ../index.php?msg=$msg");
        exit;
    }
    else{
        $msg = "Je rank is niet hoog genoeg om caches te maken!";

        header("location: ../index.php?msg=$msg");
        exit;
    }
}