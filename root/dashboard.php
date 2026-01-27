<?php
include ('classes/HTMLPage.class.php');

session_start();
if(!$_SESSION['Loggedin']){
    header("location: ../index.php?session=time_out")
    exit;
}

$html = new HTMLPage();
print $html->head('Good News');



print $html->foot();