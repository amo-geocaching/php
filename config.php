<?php
/**
 * Created by PhpStorm.
 * User: Sem40
 * Date: 15/04/2019
 * Time: 09:27
 */

$dbHost = "localhost";
$dbName = "geocaching";
$dbUser = "root";
$dbPass = "";

$db = new PDO(
    "mysql:host=$dbHost;dbname=$dbName",
    $dbUser,
    $dbPass
);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}