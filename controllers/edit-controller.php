<?php
/**
 * Created by PhpStorm.
 * User: timo0
 * Date: 29-8-2019
 * Time: 11:57
 */

require '../config.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$email = $_POST['email'];

$sql = "SELECT * FROM users WHERE email = :email";
$prepare = $db->prepare($sql);
$prepare->execute([
    ':email' => $email
]);
$result = $prepare->fetch(PDO::FETCH_ASSOC);
$hashedpassword = $result['password'];

//kijkt of er een mail is opgegeven
if(empty($email)){
    echo 'Je hebt geen email opgegeven, je wordt nu teruggestuurd';
    header( "refresh:4;url=../forgot-pass.php" );
    exit();
}

//kijkt of het een geldig email is
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo 'Dit is geen geldig email, je wordt nu teruggestuurd';
    header( "refresh:4;url=../forgot-pass.php" );
    exit();
}

//kijkt of er een account bestaat met deze email
//zo ja verstuurd hij een email
else if ($email == $result['email']){
    header("refresh:4;url=../index.php");

    echo"Er is een mail verstuurd om je wachtwoord te reseten, je wordt nu teruggestuurd";

    $to      = $email;
    $subject = 'Geocaching account aanpassen';
    $messagemail = '
 
<p>Je krijgt deze mail omdat je op onze website gekozen hebt om je account te veranderen. Druk hieronder om verder te gaan
</p>
 
<form action="">
    <input type="submit" value="edit">
</form>
------------------------

<p>Ken jij deze activiteit niet? dan kan je deze mail negeren.</p>
';

    $headers = 'From:noreply@geocaching-project.nl';
    mail($to, $subject, $messagemail, $headers);
}
else {
    echo "Er bestaat geen account met deze email, je wordt nu teruggestuurd";
    header( "refresh:4;url=../user-login.php" );
    exit();
}
