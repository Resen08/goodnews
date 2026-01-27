<?php
session_start();

include_once('../classes/DatabaseConnection.class.php');
$dbc = new DatabaseConnection();

$_SESSION['user'] = filter_input(INPUT_POST, "user", FILTER_SANITIZE_STRING);
$_SESSION['password'] = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

if ($dbc->login($_SESSION['user'], $_SESSION['password'])) {
    $user = $_SESSION['user'];
    session_unset();
    $_SESSION['Loggedin'] = true;
    $_SESSION['username'] = $user;
    //SAVE-SERVER-TOKEN 
    
    header("location: dashboard.php");
   
} else {
    session_unset();
    header("location:../index.php?error=true");
    exit;
}
