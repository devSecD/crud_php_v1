<?php

function update_people($connection, $id, $name, $lastname, $domicile){
    $connection->query("UPDATE persona SET name='$name', lastname='$lastname', domicile='$domicile' WHERE id='$id'");
    return "ok";
}