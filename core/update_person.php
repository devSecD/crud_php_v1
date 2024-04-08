<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function update_people($connection, $id, $name, $lastname, $domicile){
    $statement = $connection->prepare("UPDATE persona SET name=?, lastname=?, domicile=? WHERE id=?");
    $connection = null;
    $statement->bindValue(1, $name, PDO::PARAM_STR);
    $statement->bindValue(2, $lastname, PDO::PARAM_STR);
    $statement->bindValue(3, $domicile, PDO::PARAM_STR);
    $statement->bindValue(4, $id, PDO::PARAM_INT);
    $statement->execute();
    $statement = null;
    return "ok";
}