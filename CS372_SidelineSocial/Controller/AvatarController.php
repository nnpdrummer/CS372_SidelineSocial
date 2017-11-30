<?php
    require '../Controller/MenuTemplateController.php';
    session_start();
    
    $connection = connectToDB();
    
    $username = $_GET['user'];
    
    $query = "SELECT * FROM users WHERE username = '$username'";
    $row = mysqli_fetch_assoc(mysqli_query($connection, $query));
    if ($row == null) {
         $error = true;
    }
    
    header("Content-type: image/jpeg");
    echo($row['avatar']);
?>