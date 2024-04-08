<?php

function register_people($connection, $name, $lastname, $domicile){
    $statement = $connection->prepare("INSERT INTO persona (name, lastname, domicile) VALUES (?, ?, ?)");
    $connection = null;
    $statement->bindValue(1, $name, PDO::PARAM_STR);
    $statement->bindValue(2, $lastname, PDO::PARAM_STR);
    $statement->bindValue(3, $domicile, PDO::PARAM_STR);
    $statement->execute();
    $statement = null;
    return "ok";
}