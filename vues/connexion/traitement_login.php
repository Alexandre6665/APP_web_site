<?php
session_start();
include 'connectToDB_con.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = $_POST['mail'];
    $pwd = $_POST['pwd'];

    if (empty($mail) || empty($pwd)) {
        $error_message = "Veuillez remplir tous les champs.";
    } else {
        try {
            // Utilisation de $pdo pour accéder à la base de données
            $stmt = $bdd->prepare('SELECT * FROM compte WHERE mail = :mail');
            $stmt->execute(['mail' => $mail]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($pwd, $user['pwd'])) {
                $_SESSION['user_id'] = $user['id_compte'];
                $_SESSION['user_type'] = $user['types'];
                header("Location: gestion_compte.php");
                exit();
            } else {
                $error_message = "Email ou mot de passe incorrect.";
            }
        } catch (PDOException $e) {
            $error_message = "Erreur de connexion à la base de données: " . $e->getMessage();
        }
    }
}
?>
