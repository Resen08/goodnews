<?php
session_start();
if(!$_SESSION['Loggedin']){
    header("location: ../index.php?session=time_out");
    exit;
}

include ('../classes/HTMLPage.class.php');
include ('../classes/News.class.php');

$html = new HTMLPage();
$news = new News();
$user = $_SESSION['username'];
print $html->head('Good News');
print $news->getHeader($user);
print $html->foot();