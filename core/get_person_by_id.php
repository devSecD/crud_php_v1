<?php

function get_people_by_id($connection, $id){
    $data = $connection->prepare("SELECT * FROM persona WHERE id = ?");
    $connection = null;
    $data->bindValue(1, $id, PDO::PARAM_INT);
    $data->execute();
    $result = $data->fetch(PDO::FETCH_ASSOC);
    $data = null;
    return $result;
}