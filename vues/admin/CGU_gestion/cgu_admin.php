<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Gestion des CGU</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cgu.css">
</head>
<body>
    <?php
    include '../header.php';

    
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

        
        $stmt = $conn->prepare("INSERT INTO cgu (titre, texte) VALUES (?, ?)");
        $stmt->bind_param("ss", $titre, $texte);

        if ($stmt->execute()) {
            echo "Nouvelle entrée ajoutée avec succès.";
        } else {
            echo "Erreur: " . $stmt->error;
        }

        $stmt->close();
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
        $id = $_POST['id_cgu'];
        $titre = $_POST['titre'];
        $texte = $_POST['texte'];

        
        $stmt = $conn->prepare("UPDATE cgu SET titre = ?, texte = ? WHERE id_cgu = ?");
        $stmt->bind_param("ssi", $titre, $texte, $id);

        if ($stmt->execute()) {
            echo "Entrée mise à jour avec succès.";
        } else {
            echo "Erreur: " . $stmt->error;
        }

        $stmt->close();
    }

    // Suppression d'une entrée existante
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
        $id = $_POST['id_cgu'];

        // Utilisation de requêtes préparées pour sécuriser les données
        $stmt = $conn->prepare("DELETE FROM cgu WHERE id_cgu = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Entrée supprimée avec succès.";
        } else {
            echo "Erreur: " . $stmt->error;
        }

        $stmt->close();
    }

    // Récupération des CGU pour affichage
    $sql = "SELECT id_cgu, titre, texte FROM cgu";
    $result = $conn->query($sql);
    ?>

    <main>
        <h1>Gestion des Conditions Générales d'Utilisation (CGU)</h1>
        <hr>

        <!-- Formulaire d'ajout -->
        <h2>Ajouter une nouvelle section des CGU</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="titre">Titre:</label><br>
            <input type="text" id="titre" name="titre" required><br>
            <label for="texte">Texte:</label><br>
            <textarea id="texte" name="texte" required></textarea><br>
            <input type="submit" name="add" value="Ajouter">
        </form>
        <hr>

        <!-- Tableau d'édition -->
        <h2>Modifier les sections existantes des CGU</h2>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input type="hidden" name="id_cgu" value="<?php echo $row['id_cgu']; ?>">
                    <label for="titre_<?php echo $row['id_cgu']; ?>">Titre:</label><br>
                    <input type="text" id="titre_<?php echo $row['id_cgu']; ?>" name="titre" value="<?php echo htmlspecialchars($row['titre']); ?>" required><br>
                    <label for="texte_<?php echo $row['id_cgu']; ?>">Texte:</label><br>
                    <textarea id="texte_<?php echo $row['id_cgu']; ?>" name="texte" required><?php echo htmlspecialchars($row['texte']); ?></textarea><br>
                    <input type="submit" name="edit" value="Modifier">
                    <input type="submit" name="delete" value="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette section?');">
                </form>
                <hr>
                <?php
            }
        } else {
            echo "Aucune section des CGU trouvée.";
        }
        $conn->close();
        ?>
    </main>

    <?php 
    include '../footer.php';
    ?>
</body>
</html>
