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

?>