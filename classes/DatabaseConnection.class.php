<?php

class DatabaseConnection{

    private $db;
    private $home = false;

    const DBUSERSCHOOL = 'bg24c_u005';
    const DBPASSSCHOOL = '258503';

    public function __construct(){
        $this->db = new mysqli('localhost', self::DBUSERSCHOOL, self::DBPASSSCHOOL, self::DBUSERSCHOOL);
        $this->db->query("SET NAMES 'utf8mb4'"); 
        $this->db->query("SET CHARACTER SET 'utf8mb4'");
    }

    public function getDB(){
        return $this->db;
    }

    public function login($user, $pass){
        $stmt = "SELECT pass From userDB WHERE user='".$user."'";
        $result = $this->db->query($stmt);
        $hashpass = password_hash($pass, PASSWORD_DEFAULT);

        if ($result && $row = $result->fetch_assoc()) {
            if (password_verify($pass, $row['pass'])) {
                return true;
            }
        }
        return false;
    }

}