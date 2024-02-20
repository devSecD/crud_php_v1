<?php
if($_SERVER['REQUEST_METHOD'] == "POST" && 
isset($_POST["id"]) && !empty($_POST["id"]) &&
isset($_POST["name"]) && !empty($_POST["name"]) &&
isset($_POST["lastname"]) && !empty($_POST["lastname"]) &&
isset($_POST["domicile"]) && !empty($_POST["domicile"])
){
    echo json_encode($_POST["id"]);
    echo json_encode($_POST["name"]);
    echo json_encode($_POST["lastname"]);
    echo json_encode($_POST["domicile"]);
}