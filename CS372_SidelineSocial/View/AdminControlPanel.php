<?php
    require '../Controller/MenuTemplateController.php';
    session_start();
    
     $connection = connectToDB();
    
    if (isset($_GET["username"])) {
        $username = $connection->real_escape_string($_GET["username"]);
        $query = "SELECT * FROM users WHERE username = '$username'";
        $row = mysqli_fetch_assoc(mysqli_query($connection, $query));
        if (!$row == null) {
            //CODE CODE CODE
        }
        else {
            $error = true;
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Administrator Control Panel</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../CSS/AdminControlPanel.css" />
    	<link rel="stylesheet" type="text/css" href="../CSS/MenuTemplate.css" />
    	<script src="../Javascript/AdminControlPanel.js"></script>
    </head>
    <body>
        <?php echo(getRegisteredNavbar()); ?>
        
        <div class="header">
            <h1>Administrator Control Panel</h1>
        </div>
        <div class="main_content">
            <h2>Manage Users</h2>
            <div class="content">
                <form id="selectUserForm" action="" method="get">
                    <input type="search" id="username" name="username" placeholder="Select User..."/> <br/>
                    <p id="selectUserError"></p>
                    <input type="button" id="ban" value="BAN" onclick="validate(this);"/>
                    <input type="button" id="promote" value="PROMOTE" onclick="validate(this);">
                    <?php
        		        if ($error) {
        		            echo "<div><h2><font color=red>Could not find that user!</font></h2></div>";
        		        }
        		    ?>
                </form>
            </div>
        </div>
        <?php echo(getFooter()); ?>
    </body>
</html>