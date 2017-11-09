<?php
    require '../Menu.php';
?>
<!DOCTYPE html>
<html>
    <head>
    	<title>Logging out of your account</title>
    	<link rel="stylesheet" type="text/css" href="Logout.css" />
    	<link rel="stylesheet" type="text/css" href="../Menu.css" />
    </head>
    <body>
        <?php fillMenu(); ?>
    	<h1>You have successfully logged out of your account.</h1>
    	<h2>Please click 
    	    <a href="../Main/Main.php">here</a>
    	    if your browser does not redirect you in five seconds.</h2>
    	<script>
            var timer = setTimeout(function() {
                window.location='../Main/Main.html'
            }, 5000);
        </script>
    </body>
</html>