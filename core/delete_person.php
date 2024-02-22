<?php

function update_people($connection, $id){
    $connection->query("DELETE FROM persona WHERE id='$id'");
    return "ok";
}