<?php

function get_people($connection){
    $data = $connection->query("SELECT id, name, lastname, domicile FROM persona", PDO::FETCH_ASSOC);
    $connection = null;
    $result = $data->fetchAll();
    $data = null;
    return $result;
}