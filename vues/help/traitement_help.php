<?php
$serv = "localhost";
$un = "root";
$pwd = "";
$db = "maindb";

// Débuggage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $bdd = new PDO("mysql:host=$serv;dbname=$db", $un, $pwd);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['send'])) {
        $nom = $_POST['lastName'];
        $prenom = $_POST['firstName'];
        $mail = $_POST['mail'];
        $objet = $_POST['object'];
        $content = $_POST['content'];

        // Préparation des requêtes et liaisons
        $stmt = $conn->prepare("INSERT INTO message (nom, prenom, mail, objet, content) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nom, $prenom, $mail, $objet, $content);

        $stmt->execute();

    }

} catch (PDOException $e) {
    echo "error";
    echo "<br>" . $e->getMessage();
}


?>