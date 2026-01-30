<?php

class News{
    private $db;
    private $head;

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

    public function getPost($parent_id=null){
        if ($parent_id == null) {
            $stmt = "SELECT * FROM posts JOIN userDB using ( uid ) WHERE parent_id IS NULL";
        } else {
            $stmt = "SELECT * FROM posts JOIN userDB using ( uid ) WHERE parent_id='$parent_id'";
        }
        $post = $this->db->query($stmt);
        while($row = $post->fetch_assoc()){
            $head .= "
                    <div class='postUploaded'>
                        <div class='postuploadedHeader'>
                            <div class='postLeft'>
                                <span class='uploader'>".$row['user']."</span>
                                <span class='postTitle'>".$row['title']." </span>
                            </div>
                            <div class='postRight'>
                                <span class='created'> ".$row['created']." </span>
                            </div>
                        </div>
                        <div class='postContent'>".$row['content']."</div>
            ";
            $head .= $this->getPost($row['pid']);
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