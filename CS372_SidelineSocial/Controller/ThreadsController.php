<?php
require '../Model/ThreadsModel.php';

function createThreadInfo(){
    parseThreadInfo($_GET['threadid']);
}

function getThreadTitle(){
    return getThreadNameFromDB();
}

function getFirstPost(){
    return buildFirstPost();
}

function getOtherPosts(){
    return buildOtherPostsTable();
}

function createPostController(){
    return createPostInDB($_GET['threadid'], $_COOKIE['username'], $_POST['reply_post'], date("Y-m-d H:i:s"));
}
?>