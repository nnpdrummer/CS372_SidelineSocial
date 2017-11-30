<?php
require '../Model/BoardModel.php';

function createBoardInfo(){
    parseThreadInfo();
}

function getBoardName(){
    return getBoardNameFromDB();
}

function getThreadTable(){
    return buildThreadTable();
}

function createThreadController(){
    createThreadInDB($_POST['thread_title'],$_POST['post_content']);
}

//ensure input function

?>