<?php
require '../Model/ThreadsModel.php'

function checkIfThreadExists(){
    return doesThreadExist();
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