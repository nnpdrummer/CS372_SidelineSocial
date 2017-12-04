<?php
    require '../Controller/MenuTemplateController.php';
    session_start();
    
    $connection = connectToDB();
    
    $username = $_GET['user'];
    
    $query = "SELECT *, DATE_FORMAT(joindate, '%%M %%D, %%Y') AS fDate FROM users WHERE username = '$username'";
    $row = mysqli_fetch_assoc(mysqli_query($connection, $query));
    if ($row == null) {
         $error = true;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= $row['username']; ?>'s Profile</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../CSS/UserProfile.css" />
    	<link rel="stylesheet" type="text/css" href="../CSS/MenuTemplate.css" />
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
                    <img id='avatar' alt='Avatar Picture' src=<?php
                        if ($error || $row['avatar'] == null) {
                            echo("'../Images/user.ico'");
                        }
                        else {
                            echo("'../Controller/AvatarController.php?user=" . $username . "'");
                        }
                    ?> />
                    <!--<?php
                        if ($error || $row['avatar'] == null) {
                            echo("<img id='avatar' src='../Images/user.ico' alt='Avatar Picture'>");
                        }
                        else {
                            echo("<img id='avatar' src='../Controller/AvatarController.php?user=" . $username . "' alt='Avatar Picture'>");
                        }
                    ?>-->
                </div>
                <div class="userinfo">
                    <label>Username: </label>
                    <?php
                        if ($error) {
                            echo("<input id='username' type='text' readonly value='Username not found!' />");
                        }
                        else {
                            echo("<input id='username' type='text' readonly value='" . $row['username'] . "' />");
                        }
                    ?>
                    <br />
                    <label>User Type: </label>
                    <?php
                        if ($error || $row['usertype'] == 0) {
                            echo("<input id='usertype' type='text' readonly value='General User' />");
                        }
                        else {
                            echo("<input id='usertype' type='text' readonly value='Admin User' />");
                        }
                    ?>
                    <br />
                    <label>Join Date: </label>
                    <?php
                        if ($error) {
                            echo("<input id='date' type='text' readonly value=' ' />");
                        }
                        else {
                            echo("<input id='date' type='text' readonly value='". $row['fDate'] . "' />");
                        }
                    ?>
                </div>
            </div>
            <div class="bio">
                <h1>About Me</h1>
                <?php
                    if ($error || $row['bio'] == null) {
                        echo("<textarea readonly></textarea>");
                    }
                    else {
                        echo("<textarea readonly>" . $row['bio'] . "</textarea>");
                    }
                ?>
            </div>
        </div>
        <?php echo(getFooter()); ?>
    </body>
</html>