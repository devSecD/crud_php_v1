<?php

function update_people($connection, $id){
    $statement = $connection->prepare("DELETE FROM persona WHERE id=?");
    $connection = null;
    $statement->bindValue(1, $id, PDO::PARAM_INT);
    $statement->execute();
    $statement = null;
    return "ok";
}