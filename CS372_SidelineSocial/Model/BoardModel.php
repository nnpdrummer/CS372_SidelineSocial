<?php
require_once 'DBConnect.php';

function doesBoardExist(){
    $connection = connectToDB();
    
    if (isset($_GET['categorynumber'])) {
        $categorynumber = $connection->real_escape_string($_GET['categorynumber']);
        
        $sql = sprintf("SELECT * FROM boards WHERE categorynumber = '%s' LIMIT 1;" , $categorynumber);
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

function getBoardNameFromDB(){
     $connection = connectToDB();
     $categorynumber = $connection->real_escape_string($_GET['categorynumber']);
     
     $sql = sprintf("SELECT categoryname FROM boards WHERE categorynumber = '%s'", $categorynumber);
     $result = $connection->query($sql);
     $connection->close();
     
     $boardName = "";
     if($result->num_rows > 0){
         $row = $result->fetch_assoc();
         $boardName = $row["categoryname"];
     }
     return $boardName;
}

function buildThreadTable(){
    $connection = connectToDB();
    $categorynumber = $connection->real_escape_string($_GET['categorynumber']);
    
    $sql = sprintf("SELECT threadname, op, DATE_FORMAT(latestupdate,'%%b %%e %%Y %%r') as formatDate From threads WHERE categorynumber = '%s' ORDER BY latestupdate DESC", $categorynumber);
    $result = $connection->query($sql);
    $connection->close();
    
    $rowNum = 1;
    $table = "";
    if($result->num_rows > 0 ){
        while($row = $result->fetch_assoc()) {
            $table .= "<tr";
            
            if($rowNum % 2 == 0){
               $table .= " id='even'";
            }
            
            $table .= "><td id='thread_link'><a href='Threads.php'>" . $row["threadname"] . "</a></td>" .
                        "<td id='poster_link'><a href='UserProfile.php'>" . $row["op"] . "</a></td>" .
                        "<td>" . $row["formatDate"] . "</td></tr>";
            ++$rowNum;
        }
    }
    else{
        $table .= "<tr><td colspan='3' style='text-align: center'> Hmmm, there don't seem to be any threads here. Why not create your own?</td></tr>";
    }
    return $table;
}

?>