<?php
    require 'MenuTemplate.php';
?>
<!DOCTYPE html>
<html>
    <head>
    	<title>Logging out of your account</title>
    	<link rel="stylesheet" type="text/css" href="../CSS/Logout.css" />
    	<link rel="stylesheet" type="text/css" href="../CSS/MenuTemplate.css" />
    </head>
    <body>
        <?php fillMenu(); ?>
    	<h1>You have successfully logged out of your account.</h1>
    	<h2>Please click 
    	    <a href="Main.php">here</a>
    	    if your browser does not redirect you in five seconds.</h2>
    	<script>
            var timer = setTimeout(function() {
                window.location='Main.php'
            }, 5000);
        </script>
    </body>
</html>