<?php
session_start();

echo password_hash("wakawaka", PASSWORD_DEFAULT);

private $db;

public function __construct(){
    include_once('../classes/DatabaseConnection.class.php');
    $dbc = new DatabaseConnection();
    $this->db = $dbc->getDB();
}

public function tried(){
    $this->$db = $dbc->login(filter_input(INPUT_POST, "user", FILTER_SANITIZE_STRING), filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));

    print $db;
}

tried();