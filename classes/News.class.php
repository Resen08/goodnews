<?php

class News{
    private $db;

    public function __construct(){
        include_once('DatabaseConnection.class.php');
        $dbc = new DatabaseConnection();
        $this->db = $dbc->getDB();
    }

    public function getHeader($username){
        $head = "
        <div class='panelcontainer'>
            <div class='postPanel'>
                <div class='postHeader'>
                    <h3>Willkommen in Good-Post</h3>
                </div>
                <div class='postUpload'>
                </div>";

        

        $head .= "</div>
            <div class='userPanel'>
                <h1>Home</h1>
                <h3> Hello, ".$username."</h3>
            </div>
        </div>
        ";
    
        return print $head; 
    }
}

                // <div class='postUploaded'>
                // </div>