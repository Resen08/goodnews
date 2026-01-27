<?php

class News{
    private $db;

    public function __construct(){
        include_once('DatabaseConnection.class.php');
        $dbc = new DatabaseConnection();
        $this->db = $dbc->getDB();
    }

    public function makePost(){
        print "
            <header></header>
        ";
    }
}