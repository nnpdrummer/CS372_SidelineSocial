<?php
    function fillMenu() {
        echo(
        "<div class='navbar'>
            <h1 class='banner'></h1>
            <ul class='menu'>
                <li class='home'><a href=../Main/Main.php>Home</a></li>
                <li class='search_bar'><input class='search' type='text' placeholder='Search...' /></li>
                <li class='search_icon'><button type='submit' class='searchButton'></button></li>
                <li class='login'><a href=../Login/Login.php>Login</a></li>
                <li class='register'><a href=../Register/Register.php>Register</a></li>
            </ul>
        </div>"
        );
    }
    
    function fillMenuLoggedIn() {
        echo(
        "<div class='navbar'>
            <h1 class='banner'></h1>
            <ul class='menu'>
                <li class='home'><a href=../Main/UserMain.php>Home</a></li>
                <li class='search_bar'><input class='search' type='text' placeholder='Search...' /></li>
                <li class='search_icon'><button type='submit' class='searchButton'></button></li>
                <li class='account_name'>
                    <button onclick='showMenu()' class='account_button'>Username</button>
                    <div id='dropdown' class='account_menu'>
                        <a href='../UserProfile/UserProfile.php'>View Profile</a>
                        <br />
                        <a href='../UserControlPanel/UserControlPanel.php'>Edit Profile</a>
                        <hr class='menu_divider' />
                        <a href='../AdminControlPanel/AdminControlPanel.php'>Admin Portal</a>
                        <hr class='menu_divider' />
                        <a href='../Logout/Logout.php'>Logout</a>
                    </div>
                </li>
            </ul>
        </div>"
        );
    }
    
    function placeFooter() {
        echo(
            "<footer>Created by Benjamin Schmidt & Christopher Hier. Copyright 2017. All rights reserved.</footer>"    
        );
    }
?>