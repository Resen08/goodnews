<?php
session_start();

include_once('../classes/DatabaseConnection.class.php');
$dbc = new DatabaseConnection();
session_destroy();

if ($dbc->login(filter_input(INPUT_POST, "user", FILTER_SANITIZE_STRING), filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING))) {
   print "Login successful!";
   
} else {
    print 
    "Irgendwas stimmt hier nicht!<br>
    <a href='../index.html'>Zurück zum Login</a>
    ";
}
