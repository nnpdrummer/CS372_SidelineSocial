<?php
require_once 'DBConnect.php';

function  doesThreadExist(){
    $connection = connectToDB();
    
    if (isset($_GET['threadid'])) {
        $threadid = $connection->real_escape_string($_GET['threadid']);
        
        $sql = sprintf("SELECT * FROM threads WHERE threadid = '%s' LIMIT 1;" , $threadid);
        $result = $connection->query($sql);
        $connection->close();
        
        if ($result->num_rows > 0) {
            return true;
        }
        else{
            return false;
        }
    }
    else{
        return false;
    }
}

function getThreadNameFromDB(){
    $connection = connectToDB();
    $threadid = $connection->real_escape_string($_GET['threadid']);
    
    $sql = sprintf("SELECT threadname FROM threads WHERE threadid = '%s'", $threadid);
    $result = $connection->query($sql);
    $connection->close();
    
    $title = "";
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $title = $row["threadname"];
    }
    return $title;
}

function buildFirstPost(){
    $connection = connectToDB();
    $threadid = $connection->real_escape_string($_GET['threadid']);
    
    $sql = sprintf("SELECT username, content, DATE_FORMAT(postdate,'%%b %%e %%Y %%r') as formatDate FROM threads WHERE threadid = '%s' ORDER BY latestupdate ASC", $threadid);
    $result = $connection->query($sql);
    $connection->close();
    
    $firstPost = "";
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $firstPost .= '<div class="first_post_header">' .
                            '<table><tr><th>' .
                                '<img width=20px src="../Images/user.ico" />' .
                            '</th></tr> ' .
                            '<tr><td><h3 id="poster_link">' .
                                '<a href="UserProfile.php">'. $row["username"] .'</a>' .
                            '</h3></td></tr>' .
                            '<tr><td><h3 id="date_posted">' .
                                '<a href="UserProfile.php">'. $row["formatDate"] .'</a>' .
                            '</h3></td></tr></table>' .
                        '</div>' .
                        '<div class="post_content_space">' .
                            '<div class="post_content">'. $row["content"] .'</div>' .
                        '</div>';
    }
    return $firstPost;
}

/*

<div class="first_post_header">
    <table>
        <tr>
            <th>
                <img width=20px src="../Images/user.ico" />
            </th>
        </tr>
        <tr>
            <td>
                <h3 id="poster_link">
                    <a href="UserProfile.php"></a>
                </h3> 
            </td>
        </tr>
    </table>
</div>
<div class="post_content_space">
    <div class="post_content">
    </div>
</div>

*/

function buildOtherPostsTable(){
    
}

?>