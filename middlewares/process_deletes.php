<?php

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["id"]) && !empty($_POST["id"])){
    include_once("../connections/conneciton.php");
    include_once("../core/delete_person.php");
    echo json_encode(update_people($mysqli, $_POST["id"]));
}