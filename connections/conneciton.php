<?php
// $mysqli = new mysqli("localhost", "root", "", "crud_php_v1"); // windows
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$name_database = "crud_php_v1";
$user = "root";
$pwd = "";

try {
    $mysqli = new PDO('mysql:host=localhost;dbname='.$name_database, $user, $pwd);
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}