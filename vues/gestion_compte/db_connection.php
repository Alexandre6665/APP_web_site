<?php
$serv = "localhost";
$un = "root";
$pwd = "";
$db = "maindb";

try {
    $pdo = new PDO("mysql:host=$serv;dbname=$db", $un, $pwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}
?>