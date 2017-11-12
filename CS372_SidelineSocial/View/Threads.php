<?php
    require '../Controller/MenuTemplateController.php';
    require '../Controller/ThreadsController.php';
    session_start();
    
    createThreadInfo();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Threads</title>
        <link rel = "stylesheet" type = "text/css" href = "../CSS/Threads.css" />
		<link rel = "stylesheet" type = "text/css" href = "../CSS/MenuTemplate.css" />
		<script src="../Javascript/Threads.js"></script>
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
    <div class="thread_title">
        <h1><?php echo(getThreadTitle()); ?></h1>
        <a href="#create_post">
            <input type="button" value="+ Create New Post" id="new_post_button" onclick="revealNewPostGUI();"/>
        </a>
    </div>
    
    <!-- First Post Content-->
    
    <div class="main_content">
        <?php echo(getFirstPost()); ?>
    </div>
    <!-- Other posts content -->
    
    <ul class="other_posts">
        <?php echo(getOtherPosts()); ?>
    </ul>
    <div class="create_post" id="create_post">
    </div>
    
    <div class="Page_Navigation">
        <input type="button" value="Prev" id="nav_button">
        <input type="button" value="Next" id="nav_button">
    </div>
    <?php echo(getFooter()); ?>
    </body>
</html>