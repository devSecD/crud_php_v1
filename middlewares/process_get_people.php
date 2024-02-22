<?php

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["data"]) && !empty($_POST["data"])){
    include_once("../connections/conneciton.php");
    include_once("../core/get_people.php");
    echo json_encode(get_people($mysqli));
}