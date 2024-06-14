<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Gestion des Créneaux</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gestion_seance.css">
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
        $langue = $_POST['langue'];
        $heureDebut = $_POST['heureDebut'];
        $heureFin = $_POST['heureFin'];
        $salle_id = $_POST['id_salle'];
        $film_id = $_POST['visa'];

        $stmt = $conn->prepare("INSERT INTO diffuser (langue, heureDebut, heureFin, id_salle, visa) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssii", $langue, $heureDebut, $heureFin, $salle_id, $film_id);

        if ($stmt->execute()) {
            echo "Nouveau créneau ajouté avec succès.";
        } else {
            echo "Erreur: " . $stmt->error;
        }

        $stmt->close();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
        $id = $_POST['id_diffuser'];
        $langue = $_POST['langue'];
        $heureDebut = $_POST['heureDebut'];
        $heureFin = $_POST['heureFin'];
        $salle_id = $_POST['id_salle'];
        $film_id = $_POST['visa'];

        $stmt = $conn->prepare("UPDATE diffuser SET langue = ?, heureDebut = ?, heureFin = ?, id_salle = ?, visa = ? WHERE id_diffusion = ?");
        $stmt->bind_param("sssiii", $langue, $heureDebut, $heureFin, $salle_id, $film_id, $id);

        if ($stmt->execute()) {
            echo "Créneau mis à jour avec succès.";
        } else {
            echo "Erreur: " . $stmt->error;
        }

        $stmt->close();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
        $id = $_POST['id_diffusion'];

        $stmt = $conn->prepare("DELETE FROM diffuser WHERE id_diffusion = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Créneau supprimé avec succès.";
        } else {
            echo "Erreur: " . $stmt->error;
        }

        $stmt->close();
    }

    $sql = "SELECT id_diffusion, langue, heureDebut, heureFin, id_salle, visa FROM diffuser";
    $result = $conn->query($sql);
    ?>

    <main>
        <h1>Gestion des Créneaux</h1>
        <hr>

        <h2>Ajouter un nouveau créneau</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="langue">Langue:</label><br>
            <input type="text" id="langue" name="langue" required><br>
            <label for="heureDebut">Heure de début:</label><br>
            <input type="time" id="heureDebut" name="heureDebut" required><br>
            <label for="heureFin">Heure de fin:</label><br>
            <input type="time" id="heureFin" name="heureFin" required><br>
            <label for="id_salle">ID de la salle:</label><br>
            <input type="number" id="id_salle" name="id_salle" required><br>
            <label for="visa">ID du film:</label><br>
            <input type="number" id="visa" name="visa" required><br>
            <input type="submit" name="add" value="Ajouter">
        </form>
        <hr>

        <h2>Modifier les créneaux existants</h2>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input type="hidden" name="id" value="<?php echo $row['id_diffusion']; ?>">
                    <label for="langue_<?php echo $row['id_diffusion']; ?>">Langue:</label><br>
                    <input type="text" id="langue_<?php echo $row['id_diffusion']; ?>" name="langue" value="<?php echo htmlspecialchars($row['langue']); ?>" required><br>
                    <label for="heureDebut_<?php echo $row['id_diffusion']; ?>">Heure de début:</label><br>
                    <input type="time" id="heureDebut_<?php echo $row['id_diffusion']; ?>" name="heureDebut" value="<?php echo htmlspecialchars($row['heureDebut']); ?>" required><br>
                    <label for="heureFin_<?php echo $row['id_diffusion']; ?>">Heure de fin:</label><br>
                    <input type="time" id_diffusion="heureFin_<?php echo $row['id_diffusion']; ?>" name="heureFin" value="<?php echo htmlspecialchars($row['heureFin']); ?>" required><br>
                    <label for="id_salle_<?php echo $row['id_diffusion']; ?>">ID de la salle:</label><br>
                    <input type="number" id="id_salle_<?php echo $row['id_diffusion']; ?>" name="id_salle" value="<?php echo htmlspecialchars($row['id_salle']); ?>" required><br>
                    <label for="visa_<?php echo $row['id_diffusion']; ?>">ID du film:</label><br>
                    <input type="number" id="visa_<?php echo $row['id_diffusion']; ?>" name="visa" value="<?php echo htmlspecialchars($row['visa']); ?>" required><br>
                    <input type="submit" name="edit" value="Modifier">
                    <input type="submit" name="delete" value="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce créneau?');">
                </form>
                <hr>
                <?php
            }
        } else {
            echo "Aucun créneau trouvé.";
        }
        $conn->close();
        ?>
    </main>

    <?php 
    include '../footer_admin.php';
    ?>
</body>
</html>
