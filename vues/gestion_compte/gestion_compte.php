<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

include 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $bdd->prepare('SELECT * FROM spectateur WHERE id_compte = :id_compte');
$stmt->execute(['id_compte' => $user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $code_postal = $_POST['code_postal'];
    $ville = $_POST['ville'];

    $stmt = $pdo->prepare('UPDATE spectateur SET nom = :nom, prenom = :prenom, adresse = :adresse, code_postal = :code_postal, ville = :ville WHERE id_compte = :id_compte');
    $stmt->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'adresse' => $adresse,
        'code_postal' => $code_postal,
        'ville' => $ville,
        'id_compte' => $user_id
    ]);
}
echo "Informations mises à jour avec succès.";
    header("Refresh:0");
?>


<!DOCTYPE html>
<html lang fr>

<head>
    <title>Gérer mon compte</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gestion_compte.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    include '../header.php';
    ?>
    <main>
        <div class="creation">
            <h2>Mon compte</h2>
            <hr>
            <form method="POST" action="">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required>
        <br>

        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" required>
        <br>

        <label for="adresse">Adresse:</label>
        <input type="text" id="adresse" name="adresse" value="<?= htmlspecialchars($user['adresse']) ?>" required>
        <br>

        <label for="code_postal">Code Postal:</label>
        <input type="text" id="code_postal" name="code_postal" value="<?= htmlspecialchars($user['code_postal']) ?>" required>
        <br>

        <label for="ville">Ville:</label>
        <input type="text" id="ville" name="ville" value="<?= htmlspecialchars($user['ville']) ?>" required>
        <br>

        <label for="date_naissance">Date de Naissance:</label>
        <input type="date" id="date_naissance" name="date_naissance" value="<?= htmlspecialchars($user['date_naissance']) ?>" required>
        <br>

        <input type="submit" value="Mettre à jour">
    </form>
        </div>
    </main>
    <?php 
    include '../footer.php';
    ?>
</body>