<?php
    require '../Controller/MenuTemplateController.php';
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>USERNAME Profile</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../CSS/UserProfile.css" />
    	<link rel="stylesheet" type="text/css" href="../CSS/MenuTemplate.css" />
    	<script src="../Javascript/Menu.js"></script>
    </head>
    <body>
        <?php 
            if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] === true) {
                echo(getRegisteredNavbar()); 
            }
            else {
                echo(getUnregisteredNavbar()); 
            }
        ?>
        
        <div class="profile">
            <div class="top">
                <div class="picture">
                    <img id="avatar" src="../Images/user.ico" alt="Avatar Picture">
                </div>
                <div class="userinfo">
                    <label>Username: </label>
                    <input id="username" type="text" readonly value="FanFootballLuver"/><br />
                    <label>User Type: </label>
                    <input id="usertype" type="text" readonly value="General User" /> <br />
                    <label>Join Date: </label>
                    <input id="date" type="text" readonly value="October 18, 2017" />
                </div>
            </div>
            <div class="bio">
                <h1>About Me</h1>
                <textarea readonly>I love CS372 & fantasy football!</textarea>
            </div>
        </div>
        <?php echo(getFooter()); ?>
    </body>
</html>