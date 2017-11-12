<?php
    require '../Controller/MenuTemplateController.php';
    session_start();
    
    $connection = connectToDB();
    
    if (isset($_POST["username"]) && isset($_POST["pass"]) && isset($_POST["email"])) {
        $username = $connection->real_escape_string($_POST["username"]);
        $password = $connection->real_escape_string($_POST["pass"]);
        $email = $connection->real_escape_string($_POST["email"]);
        $query = "INSERT INTO users (`username`, `email`, `password`, `joindate`) VALUES ('$username', '$email', password('$password'), NOW())";
        
        if (mysqli_query($connection, $query)) {
            $_SESSION["authenticated"] = true;
            successfulLogin($username);
            header( 'Location: Main.php' );
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
    	<link rel="stylesheet" type="text/css" href="../CSS/Register.css" />
    	<link rel="stylesheet" type="text/css" href="../CSS/MenuTemplate.css" />
    	<script src="../Javascript/Register.js"></script>
    </head>
    <body>
        <?php echo(getUnregisteredNavbar()); ?>
    	<h1>Sign up for a new account:</h1>
    	<h2>Already have an account? Login 
    	    <a href="Login.php">here</a> instead!</h2>
	    <div class="main_content">
    	    <form onsubmit="return verify(this);" action="" method="post">
     		    <h1 class="legend">Account Registration</h1>
        		<div class="register_content">
            	    <label>Your email address: </label></br>
            	    
            	    <?php if (isset($_POST["email"])): ?>
            	        <input id="email" name="email" type=e-mail required placeholder="name@location.domain" 
            	            value="<?= htmlspecialchars($_POST["email"]) ?>" /></br>
            	    <?php else: ?>
            	        <input id="email" name="email" type=e-mail required placeholder="name@location.domain" /></br>
            	    <?php endif ?>
            	    
            	    <label>Select a username: </label></br>
            	   
            	    <?php if (isset($_POST["username"])): ?>
            	        <input id="user" name="username" type=text required placeholder="Your username..." 
            	            value="<?= htmlspecialchars($_POST["username"]) ?>" /></br>
            	    <?php else: ?>
            	        <input id="username" name="username" type=text required placeholder="Your username..." /></br>
            	    <?php endif ?>
            	    
            	    <label>Select a password: </label></br>
                    <input id="pass1" name="pass" type=password required placeholder="Your password..."/></br>
                    <label>Re-enter your password: </label></br>
                    <input id="pass2" type=password required placeholder="Your password..."/></br>
            	    <div class="button">
            	        <input class="submit" type=submit value="Submit" />
            	    </div>
            	    <?php
        		        if ($error) {
        		            echo "<div><h2><font color=red>Username is already taken!</font></h2></div>";
        		        }
        		    ?>
        	    </div>
        	</form>
    	</div>
    	<?php echo(getFooter()); ?>
    </body>
</html>