<?php

function register_people($connection, $name, $lastname, $domicile){
    $connection->query("INSERT INTO persona (name, lastname, domicile) VALUES ('$name', '$lastname', '$domicile')");
    return "ok";
}