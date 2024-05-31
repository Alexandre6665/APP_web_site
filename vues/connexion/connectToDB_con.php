<?php
$serv = "localhost";
$un = "root";
$db = "maindb";
$pwd = "";

try {
    $bdd = new PDO("mysqlhost:host=$serv;dbname=$db;$un;$pwd");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}
catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}
?>