<?php 
require_once 'DBConnect.php';

function buildBoardList(){
    $connection = connectToDB();
    
    $sql = "SELECT *, DATE_FORMAT(latestupdate,'%b %e %Y %r') AS formatDate FROM boards ORDER BY latestupdate DESC";
    $result = $connection->query($sql) or die(mysqli_error($connection)); 
    $connection->close();
    
    $rowNum = 1;
    $table = "";
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $table .= "<tr";
            
            if($rowNum % 2 == 0){
               $table .= " id='even'";
            }
            
            $table .= "><td><a href='Board.php?categorynumber=$row[categorynumber]'>" . $row["categoryname"] . "</a>" .
                        "<p>" . $row["description"] . "</p>" .
                        "</td><td>" . $row["formatDate"] . "</td></tr>";
            ++$rowNum;
        }
    } 
    else {
        echo("<tr><th>Sorry, there are no available boards...</th></tr>");
    }
    
    return $table;
}
?>