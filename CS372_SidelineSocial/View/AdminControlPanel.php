<?php
    require '../Controller/MenuTemplateController.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Administrator Control Panel</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../CSS/AdminControlPanel.css" />
    	<link rel="stylesheet" type="text/css" href="../CSS/MenuTemplate.css" />
    	<script src="../Javascript/Menu.js"></script>
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
                <form id="selectUserForm">
                    <input type="search" id="selectUser" placeholder="Select User..."/> <br/>
                    <p id="selectUserError"></p>
                    <input type="button" id="ban" value="BAN" onclick="validate(this);"/>
                    <input type="button" id="promote" value="PROMOTE" onclick="validate(this);">
                </form>
            </div>
        </div>
        <?php echo(getFooter()); ?>
    </body>
</html>