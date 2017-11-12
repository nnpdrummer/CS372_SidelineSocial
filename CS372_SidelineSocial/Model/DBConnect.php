<?php

//Connect to the database
function connectToDB(){
    $host = "127.0.0.1";
    $user = "cs372";                     
    $pass = "ipfw";                                  
    $db = "ssdb";                                  
    $port = 3306;                                
    
    $connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
    
    return $connection; 
}
?>