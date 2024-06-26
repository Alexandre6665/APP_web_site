<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Films et séances</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="film_reservation.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- <script src="#" defer></script> -->
</head>

<body>
    <?php
    include '../header.php';
    ?>
    <main>
        <hr>
        <?php
// Vérifier si l'identifiant du film est passé dans l'URL
if(isset($_GET['visa'])) {
    // Établir la connexion à la base de données
    $servername = "localhost"; // ou l'adresse IP de votre serveur MySQL
    $username = "root";
    $password = "";
    $dbname = "maindb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Récupérer l'identifiant du film depuis l'URL
    $film_visa = $_GET['visa'];

    // Requête pour récupérer les informations du film
    $sql = "SELECT * FROM film WHERE visa = $film_visa"; // Supposons que l'identifiant du film est stocké dans la colonne "visa"
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Afficher les données du film
        $row = $result->fetch_assoc();
        $titre = $row["titre"];
        $realisateur = $row["realisateur"];
        $categorie = $row["categorie"];
        $duree = $row["duree"];
        $avertissement = $row["avertissement"];
        $annee = $row["annee"];
        $image = $row["image"];
        $synopsis = $row["synopsis"];
    } else {
        echo "Aucun résultat trouvé.";
    }

    // Fermer la connexion à la base de données
    $conn->close();
} else {
    echo "Identifiant du film non spécifié.";
}
?>
    <div class="container1">
        <img src="<?php echo $image; ?>" alt="<?php echo $titre; ?>">
        <div class="info">
            <h1><?php echo $titre; ?></h1>
            <p>De <?php echo $realisateur; ?></p>
            <p>Sortie le <?php echo $annee; ?></p>
            <p><?php echo $categorie; ?> (<?php echo $duree; ?>)</p>
            <h2>Avertissement</h2>
            <p><?php echo $avertissement; ?></p>
        </div>
    </div>
    <div class="synopsis">
        <h1>Synopsis</h1>
        <p><?php echo $synopsis; ?></p>
    </div>

        <?php
        // Établir la connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "maindb";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Récupérer l'ID du film de l'URL
        $visa = isset($_GET['visa']) ? (int)$_GET['visa'] : 0;
        if ($visa === 0) {
            die('Erreur: Film non spécifié.');
        }

        // Modifier la requête pour inclure un filtre sur l'visa
        $sql = "SELECT d.id_diffusion, d.heureDebut, d.heureFin, d.langue, s.nom_salle, s.id_salle, f.visa
        FROM diffuser d
        JOIN salle s ON d.id_salle = s.id_salle
        JOIN film f ON f.visa = d.visa
        WHERE d.visa = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $visa);
        $stmt->execute();
        $result = $stmt->get_result();
        ?>

        <div class="reservation">
            <h1>UGC CINE ISSY</h1>
            <div class="reservation1">
                <?php if ($result->num_rows > 0) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <a href="../reservation_paiement/reservation_paiement.php?visa=<?= urlencode($row['visa']) ?>&id_diffusion=<?= urlencode($row['id_diffusion']) ?>">
                        <div class="reservation1-2">
                            <h2><?= $row["langue"] ?></h2>
                            <p><?= $row["heureDebut"] ?></p>
                            <p>(fin <?= $row["heureFin"] ?>)</p>
                            <div class="salle">
                                <p><strong>Salle <?= $row["nom_salle"] ?></strong></p>
                                <?php
                                // Récupérer les informations des capteurs pour cette salle
                                $id_salle = $row["id_salle"];
                                $sql_capteur = "SELECT m.vol_snd, m.pwr_dsp, m.qualite
                                                FROM mesure m
                                                JOIN capteur c ON m.id_capteur = c.id_capteur
                                                WHERE c.id_salle = ?";
                                $stmt_capteur = $conn->prepare($sql_capteur);
                                $stmt_capteur->bind_param("i", $id_salle);
                                $stmt_capteur->execute();
                                $result_capteur = $stmt_capteur->get_result();

                                if ($result_capteur->num_rows > 0) {
                                    $capteur_data = $result_capteur->fetch_assoc();
                                    echo "<p>Volume sonore: " . htmlspecialchars($capteur_data["vol_snd"]) . " dB</p>";
                                    echo "<p>Puissance dissipée: " . htmlspecialchars($capteur_data["pwr_dsp"]) . " W</p>";
                                    echo "<p>Qualité du confort: " . htmlspecialchars($capteur_data["qualite"]) . "</p>";
                                } else {
                                    echo "<p>Aucune donnée de capteur disponible pour cette salle.</p>";
                                }
                                ?>
                            </div>
                        </div></a>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>Aucune diffusion disponible pour ce film.</p>
                <?php endif; ?>
            </div>
        </div>

            <?php
            $conn->close();
            ?>


    </main>
    <?php 
    include '../footer.php';
    ?>

</body>

</html>
