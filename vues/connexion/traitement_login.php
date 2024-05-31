<?php

if(isset($_POST['connect'])) {
    $mail = $_POST['mail'];
    $pwd = $_POST['pwd'];

    // Connexion à la base de données
    $dsn = 'mysql:host=localhost;dbname=maindb';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Vérification des identifiants
        $query = "SELECT * FROM compte WHERE mail = :mail AND pwd = :pwd";
        $stmt = $db->prepare($query);
        $stmt->execute(array(':mail' => $mail, ':pwd' => $pwd));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row) {
            // Vérifier si le mot de passe correspond
            if(password_verify($pwd, $row['pwd'])) {
                // Mot de passe correct, démarrage de la session
                $_SESSION['id_compte'] = $row['id_compte'];
                $_SESSION['mail'] = $row['mail'];
                $_SESSION['types'] = $row['types'];

                // Redirection vers la page de gestion de compte
                header("Location: ../gestion_compte/gestion_compte.php");
                exit;
            } else {
                echo "Identifiants incorrects.";
            }
        } else {
            echo "Identifiants incorrects.";
        }
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
