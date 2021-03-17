<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "popelton_dog_show";

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
}catch (PDOException $e){
    echo "Error!.Cannot connect to database.";
    http_response_code(503);
    die();
}
?>