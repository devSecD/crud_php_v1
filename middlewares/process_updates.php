<?php
if($_SERVER['REQUEST_METHOD'] == "POST" && 
isset($_POST["id"]) && !empty($_POST["id"]) &&
isset($_POST["name"]) && !empty($_POST["name"]) &&
isset($_POST["lastname"]) && !empty($_POST["lastname"]) &&
isset($_POST["domicile"]) && !empty($_POST["domicile"])
){
    include_once("../connections/conneciton.php");
    include_once("../core/update_person.php");
    echo json_encode(update_people($mysqli, $_POST["id"], $_POST["name"], $_POST["lastname"], $_POST["domicile"]));

}