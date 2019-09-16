<?php
/**
 * Created by PhpStorm.
 * User: timo0
 * Date: 29-8-2019
 * Time: 12:38
 */

require '../config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$username = $_POST['username'];
$mainpassword = $_POST['password'];
$secupassword = $_POST['passwordConfirm'];
$hash = $_SESSION['pass'];

$sql = "SELECT * FROM users WHERE password = :password";
$prepare = $db->prepare($sql);
$prepare->execute([
    ':password' => $hash
]);
$result = $prepare->fetch(PDO::FETCH_ASSOC);

$email = $result['email'];

//past je wachtwoord aan

if($mainpassword == $secupassword && $mainpassword != "" && isset($result)){

    $hashedpassword = password_hash ( $mainpassword , PASSWORD_DEFAULT);

    $sql = "UPDATE users SET username = :username, password = :password WHERE email = :email";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':username'             => $username,
        ':password'             => $hashedpassword,
        ':email'                => $email
    ]);

    echo "Je account is succesvol aangepast, je word nu doorgestuurd";
    header("refresh:4;url=../login.php");
}
else if(!isset($result)){
    echo "FOUT";
}
else{
    echo "Je account komen niet overeen, je word teruggestuurd";
    header("refresh:4;url=../newpassword.php?pass='.$hash.'");
}