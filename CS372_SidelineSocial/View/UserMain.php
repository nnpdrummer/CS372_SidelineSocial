<?php
    require '../Menu.php';
?>
<!DOCTYPE html>
<html>
    <head>
	    <title>Welcome to Sideline Social!</title>
	    <link rel="stylesheet" type="text/css" href="../CSS/Main.css" />
	    <link rel="stylesheet" type="text/css" href="../CSS/MenuTemplate.css" />
	    <script src="../Javascript/Menu.js"></script>
    </head>
    <body>
        <?php fillMenuLoggedIn(); ?>
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
                        <tr>
                            <td>
                                <a href="Board.php">Main Discussion Board 1</a>
                                <p>Description of category of threads...</p>
                            </td>
                            <td>09/28/2017</td>
                        </tr>
                        <tr id="even">
                            <td>
                                <a href="Board.php">Main Discussion Board 2</a>
                                <p>Description of category of threads...</p>
                            </td>
                            <td>09/27/2017</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="Board.php">Main Discussion Board 3</a>
                                <p>Description of category of threads...</p>
                            </td>
                            <td>09/08/2017</td>
                        </tr>
                        <tr id="even">
                            <td>
                                <a href="Board.php">Main Discussion Board 4</a>
                                <p>Description of category of threads...</p>
                            </td>
                            <td>08/23/2017</td>
                        </tr>
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
        <?php placeFooter(); ?>
    </body>
</html>