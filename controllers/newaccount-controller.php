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

$mainpassword = $_POST['password-main'];
$secupassword = $_POST['password-secu'];
$hash = $_SESSION['hashedpassword'];

$sql = "SELECT * FROM users WHERE password = :password";
$prepare = $db->prepare($sql);
$prepare->execute([
    ':password' => $hash
]);
$result = $prepare->fetch(PDO::FETCH_ASSOC);

$email = $result['email'];

//past je wachtwoord aan

if($mainpassword == $secupassword && $mainpassword != "" && $hash == $result['password']){

    $hashedpassword = password_hash ( $mainpassword , PASSWORD_DEFAULT);

    $sql = "UPDATE users SET password = :password WHERE email = :email";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':email'                => $email,
        ':password'             => $hashedpassword
    ]);

    echo "Je account is succesvol aangepast, je word nu teruggestuurd";
    header("refresh:4;url=../user-login.php");
}
else if($hash != $result['password']){
    echo "FOUT";
}
else{
    echo "Je account komen niet overeen, je word teruggestuurd";
    header("refresh:4;url=../newpassword.php?hashedpassword='.$hashedpassword.'");
}