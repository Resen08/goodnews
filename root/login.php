<?php
session_start();

include_once('../classes/DatabaseConnection.class.php');
$dbc = new DatabaseConnection();

if(isset($_SESSION['token'])){
    session_unset();
    print "Sie sind bereits eingeloggt!<br>";
    exit;
}
if ($dbc->login(filter_input(INPUT_POST, "user", FILTER_SANITIZE_STRING), filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING))) {
    session_unset();
    print "Sie sind eingeloggt!";
    $_SESSION['token'] = "Du bist eingeloggt";
   
} else {
    session_unset();
    print 
    "Irgendwas stimmt hier nicht!<br>
    <a href='../index.html'>Zurück zum Login</a>
    ";
}
