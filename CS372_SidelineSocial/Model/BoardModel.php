<?php
require_once 'DBConnect.php';

$boardName = "";
$boardID = 1; 
$boardInfo = array();

function parseThreadInfo($rawCatNum){
    global $boardName, $boardInfo, $boardID;
    $connection = connectToDB();
    $categorynumber = $connection->real_escape_string($rawCatNum);
    
    $sql = sprintf("SELECT categoryname, threadid, threadname, op, DATE_FORMAT(t.latestupdate,'%%b %%e %%Y %%r') as formatDate FROM threads t INNER JOIN boards b WHERE t.categorynumber = '%s' and b.categorynumber = '%s' ORDER BY t.latestupdate DESC", $categorynumber, $categorynumber);
    $result = $connection->query($sql);
    
    if($result->num_rows > 0){
        $connection->close();
        
        while($row = $result->fetch_assoc()){
            $boardName = $row["categoryname"];
            array_push($boardInfo, array('threadid' => $row["threadid"], 'threadname' => $row["threadname"], 'op' => $row["op"], 'date' => $row["formatDate"]));
        }
    }
    else{
        $sql = sprintf("SELECT categoryname FROM boards WHERE categorynumber = '%s'", $categorynumber);
        $result = $connection->query($sql);
        $connection->close();
        
        if($result->num_rows <= 0){
            header("Location: Main.php");
        }
        else{
            $row = $result->fetch_assoc();
            $boardName = $row["categoryname"];
        }
    }
}

function getBoardNameFromDB(){
     global $boardName;
     return $boardName;
}

function buildThreadTable(){
    global $boardInfo;
    $table = "";
    $boardInfoLength = count($boardInfo);
    
    if($boardInfoLength <= 0){
        $table .= "<tr><td colspan='3' style='text-align: center'> Hmmm, there don't seem to be any threads here. Why not create your own?</td></tr>";
    }
    else{
        for($rowNum = 0; $rowNum < $boardInfoLength; $rowNum++) {
            $table .= "<tr";
            
            if(($rowNum + 1) % 2 == 0){
               $table .= " id='even'";
            }
            
            $table .= "><td id='thread_link'><a href='Threads.php?threadid=" . $boardInfo[$rowNum]['threadid'] . "'>". $boardInfo[$rowNum]["threadname"] . "</a></td>" .
                        "<td id='poster_link'><a href='UserProfile.php?user=". $boardInfo[$rowNum]['op'] ."'>" . $boardInfo[$rowNum]['op'] . "</a></td>" .
                        "<td>" . $boardInfo[$rowNum]['date'] . "</td></tr>";
        }
    }
    return $table;
}

function createThreadInDB($rawThreadTitle, $rawUsername, $rawDate, $rawCatNum, $rawPostContent){
    $connection = connectToDB();
    
    $threadTitle = $connection->real_escape_string($rawThreadTitle);
    $username = $connection->real_escape_string($rawUsername);
    $date = $connection->real_escape_string($rawDate);
    $catNum = $connection->real_escape_string($rawCatNum);
    $postContent = $connection->real_escape_string($rawPostContent);
    
    $sql = sprintf("INSERT INTO threads (threadname, op, latestupdate, categorynumber) VALUES ('%s','%s','%s','%s')", $threadTitle, $username, $date, $catNum);
    $connection->query($sql);
    $sql = sprintf("SELECT threadid FROM threads WHERE threadname = '%s' AND op = '%s' AND latestupdate = '%s'", $threadTitle, $username, $date);//Get the appropriate threadid so we can insert the post content
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    $threadid = $connection->real_escape_string($row["threadid"]);
    $sql = sprintf("INSERT INTO posts (threadid, username, content, postdate) VALUES ('%s','%s','%s','%s')", $threadid, $username, $postContent, $date);
    $connection->query($sql);
    $connection->close();
    
    return $threadid;
}
?>