<?php
    function successfulLogin($username) {
        setcookie("username", $username, time() + 12 * 60 * 60);
    }
    
    function isLoggedIn() {
      if (isset ($_COOKIE["username"])) {
            setcookie("username", $_COOKIE["username"], time() + 12 * 60 * 60);
            return true;
      }
      else {
          return false;
      }
    }
    
    function successfulLogout() {
        if (isset ($_COOKIE["username"])) {
            setcookie("username", "", time() - 3600);
        }
        setcookie(session_name(), "", time() - 3600);
    }
?>