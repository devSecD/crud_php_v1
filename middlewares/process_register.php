<?php
if($_SERVER['REQUEST_METHOD'] == "POST" && 
isset($_POST["name"]) && !empty($_POST["name"]) &&
isset($_POST["lastname"]) && !empty($_POST["lastname"]) &&
isset($_POST["domicile"]) && !empty($_POST["domicile"])
){
    // echo json_encode($_POST["name"]);
    // echo json_encode($_POST["lastname"]);
    // echo json_encode($_POST["domicile"]);
    include_once("../connections/conneciton.php");
    include_once("../core/register_peeple.php");
    echo json_encode(register_people($mysqli, $_POST["name"], $_POST["lastname"], $_POST["domicile"]));
}