<?php
    require '../Controller/MenuTemplateController.php';
    session_start();
    
    if (isLoggedIn()) {
            $username = $_COOKIE["username"];
    }
    
    $connection = connectToDB();
    
    if (isset($_POST["username"])) {
        $userSelect = $connection->real_escape_string($_POST["username"]);
        $query = "SELECT * FROM users WHERE username = '$userSelect'";
        $row = mysqli_fetch_assoc(mysqli_query($connection, $query));
        if (!$row == null) {
            if (isset($_POST["control"]) && $_POST["control"] == "promote") {
                if ($row['usertype'] == 1) {
                    echo("<script language='javascript'>alert('User is already an admin!')</script>");
                }
                else {
                    $query = "UPDATE users SET usertype = 1 WHERE username = '$userSelect'";
                    mysqli_query($connection, $query);
                    echo("<script language='javascript'>alert('User promoted successfully!')</script>");
                }
            }
            else if (isset($_POST["control"]) && $_POST["control"] == "ban") {
                if ($username === $userSelect) {
                    echo("<script language='javascript'>alert('You cannot ban your own account!')</script>");
                }
                else {
                    $query = "DELETE FROM users WHERE username = '$userSelect'";
                    mysqli_query($connection, $query);
                    echo("<script language='javascript'>alert('User banned successfully!')</script>");
                }
            }
            else {
                echo("<script language='javascript'>alert('Something went wrong!')</script>");
            }
        }
        else {
            echo("<script language='javascript'>alert('Could not find that user!')</script>");
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
                <form id="selectUserForm" action="" method="post">
                    <input type="search" id="username" name="username" placeholder="Select User..."/> <br/>
                    <p id="selectUserError"></p>
                    <input type="button" id="ban" value="BAN" onclick="validate(this);"/>
                    <input type="button" id="promote" value="PROMOTE" onclick="validate(this);">
				    <input type="text" name="control" id="control" value="" hidden readonly />
                </form>
            </div>
        </div>
        <?php echo(getFooter()); ?>
    </body>
</html>