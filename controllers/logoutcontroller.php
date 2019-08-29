<?php
/**
 * Created by PhpStorm.
 * User: timo0
 * Date: 29-8-2019
 * Time: 11:15
 */
session_start();
$_SESSION['loggedin'] = false;
$_SESSION['id'] = null;
header("Location: ../index.php");