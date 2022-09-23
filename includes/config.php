<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "sayout_database";

// $server = "sql210.epizy.com";
// $username = "epiz_32651759";
// $password = "rNcWkYZIbW3n3c";
// $database = "epiz_32651759_sayout_database";

try {
    $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (\PDOException $e) {
    echo "Database Connection Failed" . $e ->getMessage();
}

session_start();
?>