<?php
    //Connect to the database
    $host = "127.0.0.1";
    $user = "cghier";                     
    $pass = "";                                  
    $db = "main";                                  
    $port = 3306;                                
    
    $connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
?>