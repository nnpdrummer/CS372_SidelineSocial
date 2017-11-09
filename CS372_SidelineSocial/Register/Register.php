<?php
    require '../Menu.php';
?>
<!DOCTYPE html>
<html>
    <head>
    	<title>Please register an account</title>
    	<link rel="stylesheet" type="text/css" href="Register.css" />
    	<link rel="stylesheet" type="text/css" href="../Menu.css" />
    	<script type="text/javascript" src="Register.js"></script>
    </head>
    <body>
        <?php fillMenu(); ?>
    	<h1>Sign up for a new account:</h1>
    	<h2>Already have an account? Login 
    	    <a href="../Login/Login.php">here</a> instead!</h2>
	    <div class="main_content">
    	    <form onsubmit="return verify(this);" action="../Main/UserMain.html">
     		    <h1 class="legend">Account Registration</h1>
        		<div class="register_content">
            	    <label>Your email address: </label></br>
            	    <input id="email" type=e-mail required placeholder="name@location.domain"/></br>
            	    <label>Select a username: </label></br>
            	    <input id="username" type=text required placeholder="Your username..."/></br>
            	    <label>Select a password: </label></br>
                    <input id="pass1" type=password required placeholder="Your password..."/></br>
                    <label>Re-enter your password: </label></br>
                    <input id="pass2" type=password required placeholder="Your password..."/></br>
            	    <div class="button">
            	        <input class="submit" type=submit value="Submit" />
            	    </div>
        	    </div>
        	</form>
    	</div>
    	<?php placeFooter(); ?>
    </body>
</html>