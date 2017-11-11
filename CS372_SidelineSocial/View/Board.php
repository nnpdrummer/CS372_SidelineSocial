<?php
    require 'MenuTemplate.php';
    require '../Model/DBConnect.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Boards</title>
        <link rel = "stylesheet" type = "text/css" href = "../CSS/Board.css" />
        <link rel = "stylesheet" type = "text/css" href = "../CSS/MenuTemplate.css" />
        <script src="../Javascript/Board.js"></script>
    </head>
    <body>
        <?php fillMenu(); ?>
        
        <!-- Title of Board -->
        <div class="board_title">
            <h1></h1>
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
                                <input type="button" value="+ Create New Thread" id="new_thread_button" onclick="revealNewThreadGUI();">
                            </a>
                        </td>
                    </tr>
                </tfoot>
                
                <!-- List of Threads -->
                <tbody>
                    <tr>
                        <td id="thread_link">
                            <a href="Threads.php">News Flash: The Patriots still suck!</a>
                        </td>
                        <td id="poster_link"><a href="UserProfile.php">Jim Bob V</a></td>
                        <td>09/28/2017</td>
                    </tr>
                    <tr id="even">
                        <td id="thread_link">
                            <a href="Threads.php">Kareem Hunt for president???</a>
                        </td>
                        <td id="poster_link"><a href="UserProfile.php">Cool Rad Man</a></td>
                        <td>09/28/2017</td>
                    </tr>
                    <tr>
                        <td id="thread_link">
                            <a href="Threads.php">Another Thread</a>
                        </td>
                        <td id="poster_link"><a href="UserProfile.php">Scooter</a></td>
                        <td>05/08/2015</td>
                    </tr>
                    <tr id="even">
                        <td id="thread_link">
                            <a href="Threads.php">Who are you?</a>
                        </td>
                        <td id="poster_link"><a href="UserProfile.php">Cool Rad Man</a></td>
                        <td>09/28/2017</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="create_thread" id="create_thread">
            
        </div>
        <div class="Page_Navigation">
            <input type="button" value="Prev" id="nav_button">
            <input type="button" value="Next" id="nav_button">
        </div>
        <?php placeFooter(); ?>
    </body>
</html>