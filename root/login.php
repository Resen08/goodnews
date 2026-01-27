<?php
session_start();

include_once('../classes/DatabaseConnection.class.php');
$dbc = new DatabaseConnection();

if ($dbc->login(filter_input(INPUT_POST, "user", FILTER_SANITIZE_STRING), filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING))) {
    print "Sie sind eingeloggt!";
    $_SESSION['Loggedin'] = true;
    $_SESSION['username'] = $_SESSION['user'];
    session_unset();
    //SAVE-SERVER-TOKEN 
    
    header("location: dashboard.php");
   
} else {
    session_unset();
    header("location:../index.php?error=true");
    exit;
}
