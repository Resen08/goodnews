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
                ";
    
        return $head; 
    }

    public function getPost(){
        //post
        $postStmt = "SELECT * FROM posts JOIN userDB using ( uid ) WHERE parent_id IS NULL";
        $post = $this->db->query($postStmt);
        while($post && $row_post = $post->fetch_assoc()){
            $head .= "
                    <div class='postUploaded'>
                        <div class='postuploadedHeader'>
                            <div class='postLeft'>
                                <span class='uploader'>".$row_post['user']."</span>
                                <span class='postTitle'>".$row_post['title']." </span>
                            </div>
                            <div class='postRight'>
                                <span class='created'> ".$row_post['created']." </span>
                            </div>
                        </div>
                        <br>
                        <span class='postContent'>".$row_post['content']."</span>
                    <br><br><h3>Kommentare:</h3>
            ";

            //Kommentare
            $kommentStmt = "SELECT * FROM posts JOIN userDB using ( uid ) WHERE parent_id='$row_post[pid]'";
            $kom = $this->db->query($kommentStmt);
            while($kom && $row_kom = $kom->fetch_assoc()){
                $head .="
                    <div class='kommentare'>                        
                        <div class='postuploadedHeader'>
                            <div class='postLeft'>
                                <span class='uploader'>".$row_kom['user']."</span>
                                <span class='postTitle'>".$row_kom['title']." </span>
                            </div>
                            <div class='postRight'>
                                <span class='created'> ".$row_kom['created']." </span>
                            </div>
                        </div>
                        <br>
                        <span class='postContent'>".$row_kom['content']."</span>
                    </div>";
            }

            $head .="
                        
                    </div>
                ";
        }

        return $head;
    }

    public function footheader($username){
        return $head = "</div>
            <div class='userPanel'>
                <h1>Home</h1>
                <h3> Hello, ".$username."</h3>
            </div>
        </div>
        ";


    }

}