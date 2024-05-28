<?php
$serv = "localhost";
$un = "root";
$pwd = "";
$db = "maindb";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $bdd = new PDO("mysql:host=$serv;dbname=$db", $un, $pwd);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Erreur : ".$e->getMessage();
}
?>