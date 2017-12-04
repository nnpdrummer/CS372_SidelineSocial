<?php
require_once 'DBConnect.php';

$resultInfo = array();

function runSearch($text){
    global $resultInfo;
    $connection = connectToDB();
    $text = $connection->real_escape_string($text);
    
    $sql = "SELECT p.content, p.username, DATE_FORMAT(p.postdate, '%M %D %Y %r') as formatDate, t.threadname, t.threadid FROM `posts` p " . 
            "INNER JOIN `threads` t ON t.threadid = p.threadid WHERE p.content LIKE '%" . $text . "%' ORDER BY postdate ASC";
    $result = $connection->query($sql);
    $connection->close();
    
    if($result->num_rows > 0){
        
        while($row = $result->fetch_assoc()){
            array_push($resultInfo, array('threadname' => $row["threadname"], 'username' => $row["username"], 
                    'date' => $row["formatDate"], 'content' => $row["content"], 'threadid' => $row["threadid"]));
        }
    }
    else{
        echo("<script>alert('No results found!')</script>");
    }
}

function buildResultsTable(){
    global $resultInfo;
    
    $otherPosts = "";
    for($rowNum = 0; $rowNum < count($resultInfo); $rowNum++){
        $otherPosts .= '<li class="other_post_0"><div class="other_content"><div class="other_post_header"><h2><center>Thread Title:</center>' . 
                        '</h2><br /><h3 id="poster_link"><a href="../View/Threads.php?threadid=' . $resultInfo[$rowNum]['threadid'] . '">' . 
                        $resultInfo[$rowNum]['threadname'] . '</a></h3></div><div class="other_post_header">' .
                        '<table><tr><th>' . '<img width=20px src="../Controller/AvatarController.php?user='. $resultInfo[$rowNum]['username'] .'"/> </th></tr>' .
                        '<tr><td><h3 id="poster_link"><a href="UserProfile.php?user='. $resultInfo[$rowNum]['username'] .'">' . $resultInfo[$rowNum]['username'] . '</a></h3></td></tr>' .
                        '<tr><td><h3 id="date_posted">' . $resultInfo[$rowNum]['date'] . '</h3></td></tr></table></div>' .
                        '<div class="post_content_space"><div class="post_content">' . $resultInfo[$rowNum]['content'] . '</div></div></div></li>';
    }
    return $otherPosts;
}
?>