<?php
    require '../Model/DBConnect.php';
    require '../Controller/MenuTemplateController.php';
    
    if (isset($_POST["username"])) {
        $username = $connection->real_escape_string($_POST["username"]);
        $password = $connection->real_escape_string($_POST["pass"]);
        $query = "SELECT * FROM users WHERE username = '$username' AND password = password('$password')";
        $row = mysqli_fetch_assoc(mysqli_query($connection, $query));
        if (!$row == null) {
            header( 'Location: UserMain.php' );
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
    	<link rel="stylesheet" type="text/css" href="../CSS/Login.css" />
    	<link rel="stylesheet" type="text/css" href="../CSS/MenuTemplate.css" />
    </head>
    <body>
        <?php echo(getUnregisteredNavbar()); ?>
    	<h1>Login to your account:</h1>
    	<h2>Don't have an account? Sign up for a new account 
    	    <a href="Register.php">here</a>!</h2>
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
    	<?php echo(getFooter()); ?>
    </body>
</html>