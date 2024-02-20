<?php

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["id"]) && !empty($_POST["id"])){
    echo json_encode($_POST["id"]);
    // include_once("");
}