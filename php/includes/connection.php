<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "db";
$username = "museu";
$password = "museu";
$db = "museu";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_SESSION)) {
        session_destroy();
    }
    session_start();
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
