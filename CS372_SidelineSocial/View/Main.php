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
                echo("<div><h2><center><font color=#FF0000>Your account has been deleted successfully!</font></center></h2></div>");
            }
            else if ($_GET["del"] == 1) {
                echo("<div><h2><center><font color=#FF0000>Could not delete your account!</font></center></h2></div>");
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
                    <li><strong><u>Rule 1:</u></strong> No hacking and/or trying to crash the site. Don't ruin it for everyone else.</li>
                    <li><strong><u>Rule 2:</u></strong> No advertising or spamming. Do it somewhere else.</li>
                    <li><strong><u>Rule 3:</u></strong> No illegal activity! We don't want anyone going to jail.</li>
                    <li><strong><u>Rule 4:</u></strong> No posting or requesting personal information. Keep it anonymous & fun!</li>
                    <li><strong><u>Rule 5:</u></strong> No obscene images or links to obscene images. Stay on topic.</li>
                    <li><strong><u>Rule 6:</u></strong> Respect. Don't bully or discriminate. Why ya wanna hate?</li>
                    <li><strong><u>Rule 7:</u></strong> Admins have the right to ban any account for violation of rules.</li>
                </ul>
            </aside>
        </section>
        <?php echo(getFooter()); ?>
    </body>
</html>
