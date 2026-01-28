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

        $postStmt = "SELECT * FROM posts WHERE parent_id IS NULL";
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
                        <br><br><h3>Kommentare:</h3>
            ";

            $kommentstmt = "SELECT * FROM posts WHERE parent_id='$row[pid]'";
            $kom = $this->db->query($kommentstmt);
            while($kom && $rowss = $kom->fetch_assoc()){
                $head .="
                    <div class='kommentare'>                        
                        <div class='postuploadedHeader'>
                            <div class='postLeft'>
                    ";
                $kommentuserstmt = "SELECT user From userDB WHERE uid='$rowss[uid]'";
                $komuser = $this->db->query($kommentuserstmt);
                while($komuser && $rowsss = $komuser->fetch_assoc()){
                    $head .="
                                <span class='uploader'>".$rowsss['user']."</span>
                            ";
                }
                $head .="
                                    <span class='postTitle'>".$rowss['title']." </span>
                                </div>
                                <div class='postRight'>
                                    <span class='created'> ".$rowss['created']." </span>
                                </div>
                            </div>
                            <br>
                            <span class='postContent'>".$rowss['content']."</span>
                            
                ";


                $head .="</div>";
            }

            $head .="
                        
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