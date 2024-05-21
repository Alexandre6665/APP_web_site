<!DOCTYPE html>
<html lang fr>

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
    <header class="header">
        <a class="logo" href="../accueil/accueil.php"><img src="../images/Logo_SoundOnAir.png" alt="Logo" width="130px"
                height="20px"></a>

        <nav class="navbar">
            <button><a href="../accueil/accueil.php"><span>ACCUEIL</span></a></button>
            <div class="dropdown">
                <button><a href="#"><span>NOS SERVICES</span></a>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="../event/films_cinema.php">Films et séances</a>
                    <a href="#">Nos cinémas</a>
                </div>
            </div>
            <button><a href="#"><span>A PROPOS DE NOUS</span></a></button>

            <button><a href="../help/help.php"><span>CONTACT</span></a></button>
            <div class="dropdown">
                <button><a href="#"><span>COMPTE</span></a>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="../inscription/inscription.php">Inscription</a>
                    <a href="../connexion/connexion.php">Connexion</a>
                    <a href="../gestion_compte/gestion_compte.php">Gérer mon compte</a>
                </div>
            </div>

            <div class="lang-menu">
                <div class="selected-lang">
                    Français
                </div>
                <ul>
                    <li>
                        <a href="#" class="fr">Français</a>
                    </li>
                    <li>
                        <a href="#" class="us">English</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
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
        $sql = "SELECT d.id_diffusion, d.heureDebut, d.heureFin, d.langue, s.nom_salle, f.visa
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









        
        <!-- <div class="reservation">
            <h1>UGC CINE ISSY</h1>
            <div class="reservation1">
                <a href="../reservation_paiement/reservation_paiement.php">
                <div class="reservation1-2">
                    <h2>VOSFR</h2>
                    <p>17:00</p>
                    <p>(fin 19:15)</p>
                    <div class="salle">
                        <p><strong>Salle 2</strong></p>
                    </div>
                </div></a>
                <a href="../reservation_paiement/reservation_paiement.php">
                <div class="reservation1-3">
                    <h2>VOSFR</h2>
                    <p>19:30</p>
                    <p>(fin 21:45)</p>
                    <div class="salle">
                        <p><strong>Salle 3</strong></p>
                    </div>
                </div></a>
                <a href="../reservation_paiement/reservation_paiement.php">
                <div class="reservation1-3">
                    <h2>VF</h2>
                    <p>21:55</p>
                    <p>(fin 00:10)</p>
                    <div class="salle">
                        <p><strong>Salle 4</strong></p>
                    </div>
                </div></a>
            </div>
        </div> -->
    </main>
    <footer>
        <div class="footer">
            <a href="#">Besoin d'aide ?</a>
            <a href="../help/help.php">Contact</a>
            <a href="#">En savoir plus sur nous ?</a>
            <a href="#">Recherche</a>
        </div>
        <div class="footer-2">
            <a id="conditions" href="#">Conditions Générales</a>
            <a id="faq" href="#">FAQ</a>
            <a id="mentions" href="#">Mentions légales</a>
            <a href="#">Cookies</a>
        </div>
    </footer>

</body>

</html>