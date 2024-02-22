<?php

function get_people_by_id($connection, $id){
    $data = $connection->query("SELECT * FROM persona WHERE id = '$id'");
    $result = $data->fetch_array(MYSQLI_ASSOC);
    return $result;
}