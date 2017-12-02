<?php
require '../Model/BoardModel.php';

function createBoardInfo(){
    parseThreadInfo($_GET['categorynumber']);
}

function getBoardName(){
    return getBoardNameFromDB();
}

function getThreadTable(){
    return buildThreadTable();
}

function createThreadController(){
    return createThreadInDB($_POST['thread_title'], $_COOKIE['username'], date("Y-m-d H:i:s"), $_GET['categorynumber'], $_POST['post_content']);
}

?>