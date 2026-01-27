<?php
session_start();

include_once('../classes/DatabaseConnection.class.php');
$dbc = new DatabaseConnection();

if(isset($_SESSION['token'])){
    session_unset();
    print "Sie sind bereits eingeloggt!<br>";
    header("location: dashboard.php");
    exit;

}
if ($dbc->login(filter_input(INPUT_POST, "user", FILTER_SANITIZE_STRING), filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING))) {
    session_unset();
    print "Sie sind eingeloggt!";
    $_SESSION['Loggedin'] = "Loggedin";
    header("location: dashboard.php");
   
} else {
    session_unset();
    header("location:../index.php");
}
