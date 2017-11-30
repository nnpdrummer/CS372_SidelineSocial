<?php
    require '../Controller/MenuTemplateController.php';
    require '../Controller/MainController.php';
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
	    <title>Welcome to Sideline Social!</title>
	    <link rel="stylesheet" type="text/css" href="../CSS/Main.css" />
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
            
            if ($_GET["del"] == 2) {
                echo("<div><h2>Your account has been deleted successfully!</h2></div>");
            }
            else if ($_GET["del"] == 1) {
                echo("<div><h2>Could not delete your account!</h2></div>");
            }
        ?>
        
        <h1>Welcome to Sideline Social!</h1>
        <h3>The best fantasy football forum this side of the endzone.</h3>
        <section>
            <div class="main_content">
                <table class="thread_list">
                    <tbody>
                        <tr class="head">
                            <th id="topic">Discussion Board</th>
                            <th>Latest Post Date</th>
                        </tr>
                        <!-- Builds the table of boards -->
                        <?php echo(getBoardList()); ?>
                    </tbody>
                </table>
            </div>
            <aside>Site Rules
                <p>Description of rules & consequences</p>
                <ul>
                    <li>Rule 1</li>
                    <li>Rule 2</li>
                    <li>Rule 3</li>
                </ul>
            </aside>
        </section>
        <?php echo(getFooter()); ?>
    </body>
</html>
