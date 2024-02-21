<?php
//phpinfo();

$mysqli = new mysqli("localhost", "root", "", "crud_php_v1");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

echo "<pre>";
print_r($mysqli);
echo "</pre>";

$data = $mysqli->query("SELECT * FROM persona");

echo "<pre>";
print_r($data);
echo "</pre>";