<?php
require_once 'DBConnect.php';

$threadName = "";
$threadInfo = array();

function parseThreadInfo($rawThreadid){
    global $threadName, $threadInfo;
    $connection = connectToDB();
    $threadid = $connection->real_escape_string($rawThreadid);
    
    $sql = sprintf("SELECT content, username, DATE_FORMAT(postdate,'%%b %%e %%Y %%r') as formatDate, t.threadid, threadname FROM posts p INNER JOIN threads t WHERE t.threadid = '%s' and p.threadid = '%s' ORDER BY postdate ASC", $threadid, $threadid);
    $result = $connection->query($sql);
    $connection->close();
    
    if($result->num_rows > 0){
        
        while($row = $result->fetch_assoc()){
            $threadName = $row["threadname"];
            array_push($threadInfo, array('username' => $row["username"], 'date' => $row["formatDate"], 'content' => $row["content"]));
        }
    }
    else{
        header('Location: Main.php');
    }
}

function getThreadNameFromDB(){
    global $threadName;
    return $threadName;
}

function buildFirstPost(){
    global $threadInfo;
    $firstPost = "";
    $firstPost .= '<div class="first_post_header">' .
                            '<table><tr><th>' .
                                '<img width=20px src="../Controller/AvatarController.php?user='. $threadInfo[0]['username'] .'"/>' .
                            '</th></tr> ' .
                            '<tr><td><h3 id="poster_link">' .
                                '<a href="UserProfile.php?user='. $threadInfo[0]['username'] .'">'. $threadInfo[0]['username'] .'</a>' .
                            '</h3></td></tr>' .
                            '<tr><td><h3 id="date_posted">' . $threadInfo[0]['date'] .
                            '</h3></td></tr></table>' .
                        '</div>' .
                        '<div class="post_content_space">' .
                            '<div class="post_content">'. $threadInfo[0]['content'] .'</div>' .
                        '</div>';
    return $firstPost;
}

function buildOtherPostsTable(){
    global $threadInfo;
    
    $otherPosts = "";
    for($rowNum = 1; $rowNum < count($threadInfo); $rowNum++){
        $otherPosts .= '<li class="other_post_0"><div class="other_content"><div class="other_post_header">' .
                        '<table><tr><th>' . '<img width=20px src="../Controller/AvatarController.php?user='. $threadInfo[$rowNum]['username'] .'"/> </th></tr>' .
                        '<tr><td><h3 id="poster_link"><a href="UserProfile.php?user='. $threadInfo[$rowNum]['username'] .'">' . $threadInfo[$rowNum]['username'] . '</a></h3></td></tr>' .
                        '<tr><td><h3 id="date_posted">' . $threadInfo[$rowNum]['date'] . '</h3></td></tr></table></div>' .
                        '<div class="post_content_space"><div class="post_content">' . $threadInfo[$rowNum]['content'] . '</div></div></div></li>';
    }
    return $otherPosts;
}

function createPostInDB($rawThreadid, $rawUsername, $rawPostContent, $rawDate){
    $connection = connectToDB();
    
    $threadid = $connection->real_escape_string($rawThreadid);
    $username = $connection->real_escape_string($rawUsername);
    $postContent = $connection->real_escape_string($rawPostContent);
    $date = $connection->real_escape_string($rawDate);
    
    $sql = sprintf("INSERT INTO posts (threadid, username, content, postdate) VALUES ('%s','%s','%s','%s')", $threadid, $username, $postContent, $date);
    $connection->query($sql);
    $connection->close();
    
    return $threadid;
}

?>