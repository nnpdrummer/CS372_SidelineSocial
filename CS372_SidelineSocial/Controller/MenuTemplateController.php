<?php
require '../Model/MenuTemplateModel.php';

function getUnregisteredNavbar(){
    return fillMenu();
}

function getRegisteredNavbar(){
    return fillMenuLoggedIn();
}

function getFooter(){
    return placeFooter();
}

?>