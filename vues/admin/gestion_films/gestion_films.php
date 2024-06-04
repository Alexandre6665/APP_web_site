<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Gestion des Films</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gestion_films.css">
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
        $realisateur = $_POST['realisateur'];
        $categorie = $_POST['categorie'];
        $synopsis = $_POST['synopsis'];
        $duree = $_POST['duree'];
        $annee = $_POST['annee'];
        $avertissement = $_POST['avertissement'];
        $image = $_POST['image'];

        $stmt = $conn->prepare("INSERT INTO film (titre, realisateur, categorie, synopsis, duree, annee, avertissement, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $titre, $realisateur, $categorie, $synopsis, $duree, $annee, $avertissement, $image);

        if ($stmt->execute()) {
            echo "Nouveau film ajouté avec succès.";
        } else {
            echo "Erreur: " . $stmt->error;
        }

        $stmt->close();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
        $visa = $_POST['visa'];
        $titre = $_POST['titre'];
        $realisateur = $_POST['realisateur'];
        $categorie = $_POST['categorie'];
        $synopsis = $_POST['synopsis'];
        $duree = $_POST['duree'];
        $annee = $_POST['annee'];
        $avertissement = $_POST['avertissement'];
        $image = $_POST['image'];

        $stmt = $conn->prepare("UPDATE film SET titre = ?, realisateur = ?, categorie = ?, synopsis = ?, duree = ?, annee = ?, avertissement = ?, image = ? WHERE visa = ?");
        $stmt->bind_param("ssssssssi", $titre, $realisateur, $categorie, $synopsis, $duree, $annee, $avertissement, $image, $visa);

        if ($stmt->execute()) {
            echo "Film mis à jour avec succès.";
        } else {
            echo "Erreur: " . $stmt->error;
        }

        $stmt->close();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
        $visa = $_POST['visa'];

        $stmt = $conn->prepare("DELETE FROM film WHERE visa = ?");
        $stmt->bind_param("i", $visa);

        if ($stmt->execute()) {
            echo "Film supprimé avec succès.";
        } else {
            echo "Erreur: " . $stmt->error;
        }

        $stmt->close();
    }

    $sql = "SELECT visa, titre, realisateur, categorie, synopsis, duree, annee, avertissement, image FROM film";
    $result = $conn->query($sql);
    ?>

    <main>
        <h1>Gestion des Films</h1>
        <hr>

        <h2>Ajouter un nouveau film</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="titre">Titre:</label><br>
            <input type="text" id="titre" name="titre" required><br>
            <label for="realisateur">Réalisateur:</label><br>
            <input type="text" id="realisateur" name="realisateur" required><br>
            <label for="categorie">Catégorie:</label><br>
            <input type="text" id="categorie" name="categorie" required><br>
            <label for="synopsis">Synopsis:</label><br>
            <textarea id="synopsis" name="synopsis" required></textarea><br>
            <label for="duree">Durée:</label><br>
            <input type="text" id="duree" name="duree" required><br>
            <label for="annee">Date de sortie:</label><br>
            <input type="text" id="annee" name="annee" required><br>
            <label for="avertissement">Avertissement:</label><br>
            <input type="text" id="avertissement" name="avertissement"><br>
            <label for="image">URL de l'image:</label><br>
            <input type="text" id="image" name="image"><br>
            <input type="submit" name="add" value="Ajouter">
        </form>
        <hr>

        <h2>Modifier les films existants</h2>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input type="hidden" name="visa" value="<?php echo $row['visa']; ?>">
                    <label for="titre_<?php echo $row['visa']; ?>">Titre:</label><br>
                    <input type="text" id="titre_<?php echo $row['visa']; ?>" name="titre" value="<?php echo htmlspecialchars($row['titre']); ?>" required><br>
                    <label for="realisateur_<?php echo $row['visa']; ?>">Réalisateur:</label><br>
                    <input type="text" id="realisateur_<?php echo $row['visa']; ?>" name="realisateur" value="<?php echo htmlspecialchars($row['realisateur']); ?>" required><br>
                    <label for="categorie_<?php echo $row['visa']; ?>">Catégorie:</label><br>
                    <input type="text" id="categorie_<?php echo $row['visa']; ?>" name="categorie" value="<?php echo htmlspecialchars($row['categorie']); ?>" required><br>
                    <label for="synopsis_<?php echo $row['visa']; ?>">Synopsis:</label><br>
                    <textarea id="synopsis_<?php echo $row['visa']; ?>" name="synopsis" required><?php echo htmlspecialchars($row['synopsis']); ?></textarea><br>
                    <label for="duree_<?php echo $row['visa']; ?>">Durée:</label><br>
                    <input type="text" id="duree_<?php echo $row['visa']; ?>" name="duree" value="<?php echo htmlspecialchars($row['duree']); ?>" required><br>
                    <label for="annee_<?php echo $row['visa']; ?>">Date de sortie:</label><br>
                    <input type="text" id="annee_<?php echo $row['visa']; ?>" name="annee" value="<?php echo htmlspecialchars($row['annee']); ?>" required><br>
                    <label for="avertissement_<?php echo $row['visa']; ?>">Avertissement:</label><br>
                    <input type="text" id="avertissement_<?php echo $row['visa']; ?>" name="avertissement" value="<?php echo htmlspecialchars($row['avertissement']); ?>"><br>
                    <label for="image_<?php echo $row['visa']; ?>">URL de l'image:</label><br>
                    <input type="text" id="image_<?php echo $row['visa']; ?>" name="image" value="<?php echo htmlspecialchars($row['image']); ?>"><br>
                    <input type="submit" name="edit" value="Modifier">
                    <input type="submit" name="delete" value="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce film?');">
                </form>
                <hr>
                <?php
            }
        } else {
            echo "Aucun film trouvé.";
        }
        $conn->close();
        ?>
    </main>

    <?php 
    include '../footer_admin.php';
    ?>
</body>
</html>
