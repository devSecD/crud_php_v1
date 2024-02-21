<?php

function get_people($connection){
    $data = $connection->query("SELECT * FROM persona");
    $result = $data->fetch_all(MYSQLI_ASSOC);
    return $result;
}