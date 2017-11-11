<?php
    require 'MenuTemplate.php';
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
	<?php fillMenu(); ?>
        
    <div class="thread_title">
        <h1>
            Title of Thread
        </h1>
        <a href="#create_post">
            <input type="button" value="+ Create New Post" id="new_post_button" onclick="revealNewPostGUI();"/>
        </a>
    </div>
    
    <!-- First Post Content-->
    
    <div class="main_content">
        <div class="first_post_header">
            <table>
                <tr>
                    <th>
                        <img width=20px src="../Images/user.ico" />
                    </th>
                </tr>
                <tr>
                    <td>
                        <h3 id="poster_link">
                            <a href="UserProfile.php"></a>
                        </h3> 
                    </td>
                </tr>
            </table>
        </div>
        <div class="post_content_space">
            <div class="post_content">
            </div>
        </div>
    </div>
    <!-- Other posts content -->
    
    <ul class="other_posts">
        <li class="other_post_0">
            <div class="other_content">
                <div class="other_post_header">
                    <table>
                        <tr>
                            <th>
                                <img width=20px src="../Images/user.ico" />
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <h3 id="poster_link">
                                    <a href="UserProfile.php"></a>
                                </h3> 
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="post_content_space">
                    <div class="post_content">
                    </div>
                </div>
            </div>
        </li>
        <li class="other_post_0">
            <div class="other_content"><!-- Box around main thread content -->
                <div class="other_post_header">
                    <table>
                        <tr>
                            <th>
                                <img width=20px src="../Images/user.ico" />
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <h3 id="poster_link">
                                    <a href="UserProfile.php"></a>
                                </h3> 
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="post_content_space">
                    <div class="post_content">
                    </div>
                </div>
            </div>
        </li>
        <li class="other_post_0">
            <div class="other_content"><!-- Box around main thread content -->
                <div class="other_post_header">
                    <table>
                        <tr>
                            <th>
                                <img width=20px src="../Images/user.ico" />
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <h3 id="poster_link">
                                    <a href="UserProfile.php"></a>
                                </h3> 
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="post_content_space">
                    <div class="post_content">
                    </div>
                </div>
            </div>
        </li>
        <li class="other_post_0">
            <div class="other_content"><!-- Box around main thread content -->
                <div class="other_post_header">
                    <table>
                        <tr>
                            <th>
                                <img width=20px src="../Images/user.ico" />
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <h3 id="poster_link">
                                    <a href="UserProfile.php"></a>
                                </h3> 
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="post_content_space">
                    <div class="post_content">
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <div class="create_post" id="create_post">
    </div>
    
    <div class="Page_Navigation">
        <input type="button" value="Prev" id="nav_button">
        <input type="button" value="Next" id="nav_button">
    </div>
    <?php placeFooter(); ?>
    </body>
</html>