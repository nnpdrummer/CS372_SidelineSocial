<?php
    require '../Controller/CookieController.php';
    require '../Model/DBConnect.php';
    
    function fillMenu() {
        $navbar =
        "<div class='navbar'>
            <h1 class='banner'></h1>
            <ul class='menu'>
                <li class='home'><a href='Main.php'>Home</a></li>
                <li class='search_bar'><form method='get' action='Search.php'>
                    <input class='search' id='q' name='q' type='text' placeholder='Search...' /></li>
                <li class='search_icon'><input type='submit' class='searchButton' /></form></li>
                <li class='login'><a href='Login.php'>Login</a></li>
                <li class='register'><a href='Register.php'>Register</a></li>
            </ul>
        </div>";
        
        return $navbar;
    }
    
    function fillMenuLoggedIn() {
        $username = null;
        $connection = connectToDB();
        
        if (isLoggedIn()) {
            $username = $_COOKIE["username"];
        }
        
        $query = "SELECT usertype FROM users WHERE username = '$username'";
        $result = $connection->query($query);
        $status = $result->fetch_assoc();
        
        $navbar =
        "<div class='navbar'>
            <h1 class='banner'></h1>
            <ul class='menu'>
                <li class='home'><a href='Main.php'>Home</a></li>
                <li class='search_bar'><form method='get' action='Search.php'>
                    <input class='search' id='q' name='q' type='text' placeholder='Search...' /></li>
                <li class='search_icon'><button type='submit' class='searchButton' /></button></li>
                <li class='account_name'>
                    <button class='account_button'>" .
                    $username
                    . "</button>
                    <div id='dropdown' class='account_menu'>
                        <a href='UserProfile.php?user=" . $username . "'>View Profile</a>
                        <br />
                        <a href='UserControlPanel.php'>Edit Profile</a>"; 
                        
        if (implode($status) == 1) {
            $navbar = $navbar . 
                        "<hr class='menu_divider' />
                        <a href='AdminControlPanel.php'>Admin Portal</a>";
        }
        
        $navbar = $navbar .                 
                        "<hr class='menu_divider' />
                        <a href='Logout.php'>Logout</a>
                    </div>
                </li>
            </ul>
        </div>";
        return $navbar;
    }
    
    function placeFooter() {
        $footer = "<footer>Created by Benjamin Schmidt & Christopher Hier. Copyright 2017. All rights reserved.</footer>";
        return $footer;
    }
?>