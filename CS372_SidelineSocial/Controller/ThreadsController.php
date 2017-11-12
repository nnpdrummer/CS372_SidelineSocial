<?php
require '../Model/ThreadsModel.php';

function createThreadInfo(){
    parseThreadInfo();
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

?>