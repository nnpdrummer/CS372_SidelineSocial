<?php
    require '../Controller/MenuTemplateController.php';
    require '../Controller/ThreadsController.php';
    session_start();
    
    createThreadInfo();
    
    if(isset($_POST["post_button"])){
        if(empty($_POST['reply_post'])){
            echo "<script>alert('Post Content is missing.')</script>";
        }
        else{
            echo "<script>alert('We got here')</script>";
            $location = createPostController();
            header('Location: Threads.php?threadid=' . $location);
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= getThreadTitle(); ?></title>
        <link rel = "stylesheet" type = "text/css" href = "../CSS/Threads.css" />
		<link rel = "stylesheet" type = "text/css" href = "../CSS/MenuTemplate.css" />
		
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
        <h1><?= getThreadTitle(); ?></h1>
        
    </div>
    <a href="#create_post">
            <input type="button" value="+ Create New Post"
            <?php 
                if(isset($_COOKIE['username'])){
                    echo 'id="new_post_button">';
                }
                else{
                    echo 'id="disabled_button" disabled>';
                }
            ?>
        </a>
    
    <!-- First Post Content-->
    
    <div class="main_content">
        <?= getFirstPost(); ?>
    </div>
    <!-- Other posts content -->
    
    <ul class="other_posts">
        <?= getOtherPosts(); ?>
    </ul>
    <form id="makePost" action="Threads.php?threadid=<?= $_GET['threadid']; ?>" method="post" onsubmit="return validatePostCreation();">
        <div class="create_post" id="create_post"></div>
    </form>
    
    <div class="Page_Navigation">
        <input type="button" value="Prev" id="nav_button">
        <input type="button" value="Next" id="nav_button">
    </div>
    <?= getFooter(); ?>
    
    <!-- import js here -->
    <script src="../Javascript/Threads.js"></script>
    </body>
</html>