<?php
    require '../Controller/MenuTemplateController.php';
    require '../Controller/BoardController.php';
    session_start();
    
    createBoardInfo();
    
    if(isset($_POST["post_button"])){
        if(empty($_POST['thread_title']) || empty($_POST['post_content'])){
            echo "<script>alert('Thread Title or Post Content is missing.')</script>";
        }
        else{
            $location = createThreadController();
            header('Location: Threads.php?threadid=' . $location);
        }
    }
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
            <h1><?= getBoardName(); ?></h1>
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
                                <input type="button" value="+ Create New Thread" 
                                <?php 
                                    if(isset($_COOKIE['username'])){
                                        echo 'id="new_thread_button">';
                                    }
                                    else{
                                        echo 'id="disabled_button" disabled>';
                                    }
                                ?>
                            </a>
                        </td>
                    </tr>
                </tfoot>
                <!-- List of Threads -->
                <tbody>
                    <?= getThreadTable(); ?>
                </tbody>
            </table>
        </div>
        <!-- Create New Thread Panel -->
        <form id="makeThread" action="Board.php?categorynumber=<?= $_GET['categorynumber']; ?>" method="post" onsubmit="return validateThreadCreation();">
            <div class="create_thread" id="create_thread"></div>
        </form>
        <div class="Page_Navigation">
            <input type="button" value="Prev" id="nav_button">
            <input type="button" value="Next" id="nav_button">
        </div>
        <?= getFooter(); ?>
        
        <!-- import js here -->
        <script src="../Javascript/Board.js"></script>
    </body>
</html>