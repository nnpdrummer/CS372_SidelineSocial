<?php
    //Connect to the database
    $host = "127.0.0.1";
    $user = "cghier";                     
    $pass = "";                                  
    $db = "main";                                  
    $port = 3306;                                
    
    $connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
    
    if (isset($_POST["username"])) {
        $username = $_POST["username"];
        $password = $_POST["pass"];
        $query = "SELECT * FROM users WHERE username = '$username'";
        $row = mysqli_fetch_assoc(mysqli_query($connection, $query));
        if (!$row == null) {
            if ($row['username'] === $username && $row['password'] === $password) {
                header( 'Location: ../Main/UserMain.html' );
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
    	<title>Please register an account</title>
    	<link rel="stylesheet" type="text/css" href="Login.css" />
    	<link rel="stylesheet" type="text/css" href="../Menu.css" />
    </head>
    <body>
        <div class="navbar">
            <h1 class="banner"></h1>
            <ul class="menu">
                <li class="home"><a href=../Main/Main.html>Home</a></li>
                <li class="search_bar"><input class="search" type="text" placeholder="Search..." /></li>
                <li class="search_icon"><button type="submit" class="searchButton"></button></li>
                <li class="login"><a href=../Login/Login.html>Login</a></li>
                <li class="register"><a href=../Register/Register.html>Register</a></li>
            </ul>
        </div>
    	<h1>Login to your account:</h1>
    	<h2>Don't have an account? Sign up for a new account 
    	    <a href="../Register/Register.html">here</a>!</h2>
    	<div class="main_content">
    	    <form action="" method="post">
    	        <h1 class="legend">Account Details</h1>
    	        <div class="login_content">
    	            <label for="username">Enter your username: </label></br>
    		   	    <input type=text name="username" id="username" required placeholder="Your username..."/></br>
        		   	<label for="pass">Enter your password: </label></br>
        	       	<input type=password name="pass" required placeholder="Your password..."/></br>
        		    <input class="submit" type=submit value="Submit" />
    	        </div>
    	    </form>
    	</div>
    	<footer>Created by Benjamin Schmidt & Christopher Hier. Copyright 2017. All rights reserved.</footer>
    </body>
</html>