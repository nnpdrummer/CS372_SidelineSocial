<?php
    require '../Controller/MenuTemplateController.php';
    require '../Controller/BoardController.php';
    session_start();
    
    createBoardInfo();
    
    /*if(isset($_POST["#post_button"])){
        createThreadController();
    }*/
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Boards</title>
        <link rel = "stylesheet" type = "text/css" href = "../CSS/Board.css" />
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
        
        <!-- Title of Board -->
        <div class="board_title">
            <h1><?php echo(getBoardName()); ?></h1>
        </div>
        <!-- Main Content -->
        <div class="main_content">
            <table class="thread_list">
                <thead>
                    <tr class="head">
                        <th>Topic</th>
                        <th>Original Poster</th>
                        <th>Latest Post Date</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td class="table_footer" colspan="3">
                             <a href="#create_thread">
                                <input type="button" value="+ Create New Thread" id="new_thread_button">
                            </a>
                        </td>
                    </tr>
                </tfoot>
                <!-- List of Threads -->
                <tbody>
                    <?php echo(getThreadTable()); ?>
                </tbody>
            </table>
        </div>
        <div class="create_thread" id="create_thread">
            
        </div>
        <div class="Page_Navigation">
            <input type="button" value="Prev" id="nav_button">
            <input type="button" value="Next" id="nav_button">
        </div>
        <?php echo(getFooter()); ?>
        
        <!-- import js here -->
        <script src="jquery-3.2.1.min.js"></script>
        <script src="../Javascript/Board.js"></script>
    </body>
</html>