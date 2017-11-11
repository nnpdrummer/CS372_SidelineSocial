<?php
    require 'MenuTemplate.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>USERNAME Control Panel</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../CSS/UserControlPanel.css" />
    	<link rel="stylesheet" type="text/css" href="../CSS/MenuTemplate.css" />
    	<script src="../Javascript/Menu.js"></script>
    	<script src="../Javascript/UserControlPanel.js"></script>
    </head>
    <body>
        <?php fillMenuLoggedIn(); ?>
        <div class="header">
            <h1>User Control Panel</h1>
        </div>
        <div class="main_content">
            <div class="settings">
                <form action="" id="accountForm" onsubmit="return validate();">
                    <div class="account_settings">
                        <h2>Account Settings</h2>
                        <label for="oldPwd">Old Password:</label><br/>
                        <input type="password" name="oldPwd"><br/>
                        <p id="oldPwdError"></p>
                        <label for="newPwd">New Password:</label><br/>
                        <input type="password" name="newPwd"><br/>
                        <p id="newPwdError"></p>
                        <label for="confirmPwd">Confirm Password:</label><br/>
                        <input type="password" name="confirmPwd"><br/>
                        <p id="confirmPwdError"></p>
                        <form action="" id="changeAvatar">
                            <fieldset>
                                <legend>Change Avatar</legend>
                                <input type="file" name="profilePic" accept="image/*">
                            </fieldset>
                        </form>
                        <form action="" id="editBio">
                            <fieldset>
                                <legend>Edit Bio</legend>
                                <textarea name="bio"></textarea>
                            </fieldset>
                        </form>
                        <div class="buttons">
                            <input type="submit" id="saveChanges" value="Save Changes"/>
                            <input type="button" id="deleteAccountBtn" value="DELETE ACCOUNT" onclick="deleteAccount();"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php placeFooter(); ?>
    </body>
</html>