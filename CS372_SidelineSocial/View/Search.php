<?php
    require '../Controller/MenuTemplateController.php';
    require '../Controller/SearchController.php';
    session_start();
    
    $result = htmlspecialchars($_GET['q']);
    fetchResults($result);
?>
<!DOCTYPE html>
<html>
    <head>
	    <title>Search Results For <?= $result; ?></title>
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
            <h1>Posts found with: "<?php echo $result; ?>"</h1>
        </div>
        
        <div>
            <ul class="other_posts">
                <?= getResults(); ?>
            </ul>
        </div>
        
        <?php echo(getFooter()); ?>
    </body>
</html>