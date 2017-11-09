<?php
    require '../DBConnect.php';
    
    if (isset($_POST["username"])) {
        $username = $_POST["username"];
        $password = $_POST["pass"];
        $query = "SELECT * FROM users WHERE username = '$username' AND password = password('$password')";
        $row = mysqli_fetch_assoc(mysqli_query($connection, $query));
        if (!$row == null) {
            header( 'Location: ../Main/UserMain.html' );
        }
        else {
            $error = true;
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
        		    <?php
        		        if ($error) {
        		            echo "<div><h2><font color=red>Wrong username or password!</font></h2></div>";
        		        }
        		    ?>
    	        </div>
    	    </form>
    	</div>
    	<footer>Created by Benjamin Schmidt & Christopher Hier. Copyright 2017. All rights reserved.</footer>
    </body>
</html>