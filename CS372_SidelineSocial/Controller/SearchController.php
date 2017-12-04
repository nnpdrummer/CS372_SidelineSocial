<?php
require '../Model/SearchModel.php';

function fetchResults($text){
    runSearch($text);
}

function getResults(){
    return buildResultsTable();
}
?>