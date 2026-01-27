<?php

class News{
    private $db;

    public function __construct(){
        include_once('DatabaseConnection.class.php');
        $dbc = new DatabaseConnection();
        $this->db = $dbc->getDB();
    }

    public function getHeader($username){
        print "
            <header>
                <div class='welcomeHeader'><h1 class='welcomeHeader'>Welcome to the Good News Dashboard</h1></div>
            </header>
            <div class='userPanel'>
                <h3 class='userPanel'> Hello, ".$username."</h3>
            </div>
        ";
    }
}