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

        $postStmt = "SELECT * FROM posts";
        $post = $this->db->query($postStmt);
        while($post && $row = $post->fetch_assoc()){
            $head .= "
                    <div class='postUploaded'>
                        <div class='postuploadedHeader'>
                            <div class='postLeft'>
                    ";

                    $userStmt = "SELECT user From userDB WHERE uid='$row[uid]'";
                    $user = $this->db->query($userStmt);
                    while($user && $rows = $user->fetch_assoc()){
                    $head .="
                            <span class='uploader'>".$rows['user']."</span>
                        ";
                    }

            $head .="
                        
                                <span class='postTitle'>".$row['title']." </span>
                            </div>
                            <div class='postRight'>
                                <span class='created'> ".$row['created']." </span>
                            </div>
                        </div>
                        <br>
                        <span class='postContent'>".$row['content']."</span>

                    </div>
                ";
        }


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