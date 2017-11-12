<?php
require '../Model/BoardModel.php';

function checkIfBoardExists(){
    return doesBoardExist();
}


function getBoardName(){
    return getBoardNameFromDB();
}


function getThreadTable(){
    return buildThreadTable();
}

?>