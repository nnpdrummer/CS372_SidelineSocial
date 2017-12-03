<?php
    require '../Controller/MenuTemplateController.php';
    session_start();
    
    $connection = connectToDB();
    if (isLoggedIn()) {
            $username = $_COOKIE["username"];
    }
    
    $query = "SELECT * FROM users WHERE username = '$username'";
    $row = mysqli_fetch_assoc(mysqli_query($connection, $query));
    
    if (isset($_POST["oldPwd"]) && isset($_POST["newPwd"]) && $_POST["oldPwd"] != "") {
        $oldpass = $connection->real_escape_string($_POST["oldPwd"]);
        $newpass = $connection->real_escape_string($_POST["newPwd"]);
        $query = "SELECT * FROM users WHERE username = '$username' AND password = password('$oldpass')";
        $row = mysqli_fetch_assoc(mysqli_query($connection, $query));
        if (!$row == null) {
            $query = "UPDATE users SET password = password('$newpass') WHERE username = '$username'";
            if (mysqli_query($connection, $query)) {
                $passchange = true;
            }
            else {
                $miscerror = true;
            }
        }
        else {
            $passerror = true;
        }
    }
    
    $file = $_FILES['profilePic']['tmp_name'];
    if ($file != null) {
        $bio = $connection->real_escape_string($_POST["bio"]);
        $query = $connection->prepare("UPDATE users SET avatar = ?, bio = '$bio' WHERE username = '$username'");
        $null = null;
        $query->bind_param("b", $null);
        $query->send_long_data(0, file_get_contents($file));
        if ($query->execute()) {
            $profileupdate = true;
        }
        else {
            $miscerror = true;
        }
    }
    else if (isset($_POST["bio"])) {
        $bio = $connection->real_escape_string($_POST["bio"]);
        $query = "UPDATE users SET bio = '$bio' WHERE username = '$username'";
        if (mysqli_query($connection, $query)) {
            $profileupdate = true;
        }
        else {
            $miscerror = true;
        }
    }
    
    if ($_POST["deleteBoolean"] == "yes") {
        $query = "DELETE FROM users WHERE username = '$username'";
        if (mysqli_query($connection, $query)) {
            successfulLogout();
            $_SESSION["authenticated"] = false;
            session_destroy();
            header( 'Location: Main.php?del=2' );
        }
        else {
            header( 'Location: Main.php?del=1' );
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= $username; ?>'s Control Panel</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../CSS/UserControlPanel.css" />
    	<link rel="stylesheet" type="text/css" href="../CSS/MenuTemplate.css" />
    	<script src="../Javascript/UserControlPanel.js"></script>
    </head>
    <body>
        <?= getRegisteredNavbar(); ?>
        
        <div class="header">
            <h1>User Control Panel</h1>
            <span id = "first"></span>
            <br />
            <span id = "second"></span>
            <?php
                if ($passchange) {
                    echo("<h2><font color=#FF0000>All was updated successfully!</font></h2>");
                }
                else if ($passerror) {
                    echo("<h2><font color=#FF0000>Wrong password entered!</font></h2>");
                }
                else if ($miscerror) {
                    echo("<h2><font color=#FF0000>Something went wrong!</font></h2>");
                }
                else if ($profileupdated) {
                    echo("<h2><font color=#FF0000>Profile updated successfully!</font></h2>");
                }
            ?>
        </div>
        <div class="main_content">
            <div class="settings">
                <form action="" method ="post" id="accountForm" onsubmit="return validate();" enctype="multipart/form-data">
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
                        <fieldset>
                            <legend>Change Avatar</legend>
                            <input type='file' name='profilePic' accept='.jpeg, .jpg' />
                            <p id="picError"></p>
                        </fieldset>
                        <fieldset>
                            <legend>Edit Bio</legend>
                            <?php
                                if (isset($_POST["bio"])) {
                                    echo("<textarea name='bio'>" . $_POST['bio'] . "</textarea>");
                                }
                                else if ($row['bio'] != null) {
                                    echo("<textarea name='bio'>" . $row['bio'] . "</textarea>");
                                }
                                else {
                                    echo("<textarea name='bio'></textarea>");
                                }
                            ?>
                        </fieldset>
                        <div class="buttons">
                            <input type="submit" id="saveChanges" value="Save Changes"/>
                            <input type="button" id="deleteAccountBtn" value="DELETE ACCOUNT" onclick="deleteAccount();"/>
                            <input type="text" id="deleteBoolean" name="deleteBoolean" value="" readonly hidden />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?= getFooter(); ?>
    </body>
</html>