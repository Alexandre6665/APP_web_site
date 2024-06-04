<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Gestion des Mentions Légales</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gestion_mentions_legales.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
    include '../header_admin.php';

    $servername = "localhost"; 
    $username = "root";
    $password = ""; 
    $dbname = "maindb"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
        $titre = $_POST['titre'];
        $texte = $_POST['texte'];

        $stmt = $conn->prepare("INSERT INTO mentions_legales (titre, texte) VALUES (?, ?)");
        $stmt->bind_param("ss", $titre, $texte);

        if ($stmt->execute()) {
            echo "Nouvelle entrée ajoutée avec succès.";
        } else {
            echo "Erreur: " . $stmt->error;
        }

        $stmt->close();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
        $id = $_POST['id_ml'];
        $titre = $_POST['titre'];
        $texte = $_POST['texte'];

        $stmt = $conn->prepare("UPDATE mentions_legales SET titre = ?, texte = ? WHERE id_ml = ?");
        $stmt->bind_param("ssi", $titre, $texte, $id);

        if ($stmt->execute()) {
            echo "Entrée mise à jour avec succès.";
        } else {
            echo "Erreur: " . $stmt->error;
        }

        $stmt->close();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
        $id = $_POST['id_ml'];

        $stmt = $conn->prepare("DELETE FROM mentions_legales WHERE id_ml = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Entrée supprimée avec succès.";
        } else {
            echo "Erreur: " . $stmt->error;
        }

        $stmt->close();
    }

    $sql = "SELECT id_ml, titre, texte FROM mentions_legales";
    $result = $conn->query($sql);
    ?>

    <main>
        <h1>Gestion des Mentions Légales</h1>
        <hr>

        <h2>Ajouter une nouvelle section des Mentions Légales</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="titre">Titre:</label><br>
            <input type="text" id="titre" name="titre" required><br>
            <label for="texte">Texte:</label><br>
            <textarea id="texte" name="texte" required></textarea><br>
            <input type="submit" name="add" value="Ajouter">
        </form>
        <hr>

        <h2>Modifier les sections existantes des Mentions Légales</h2>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input type="hidden" name="id_ml" value="<?php echo $row['id_ml']; ?>">
                    <label for="titre_<?php echo $row['id_ml']; ?>">Titre:</label><br>
                    <input type="text" id="titre_<?php echo $row['id_ml']; ?>" name="titre" value="<?php echo htmlspecialchars($row['titre']); ?>" required><br>
                    <label for="texte_<?php echo $row['id_ml']; ?>">Texte:</label><br>
                    <textarea id="texte_<?php echo $row['id_ml']; ?>" name="texte" required><?php echo htmlspecialchars($row['texte']); ?></textarea><br>
                    <input type="submit" name="edit" value="Modifier">
                    <input type="submit" name="delete" value="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette section?');">
                </form>
                <hr>
                <?php
            }
        } else {
            echo "Aucune section des Mentions Légales trouvée.";
        }
        $conn->close();
        ?>
    </main>

    <?php 
    include '../footer_admin.php';
    ?>
</body>
</html>
