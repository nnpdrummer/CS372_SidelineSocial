<?php
    require '../Controller/MenuTemplateController.php';
    session_start();
    header("Content-type: image/jpeg");
    $connection = connectToDB();
    
    $username = $_GET['user'];
    
    $query = "SELECT * FROM users WHERE username = '$username'";
    $row = mysqli_fetch_assoc(mysqli_query($connection, $query));
    
    
    echo($row['avatar']);
?>