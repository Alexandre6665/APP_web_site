<!DOCTYPE html>
<html lang fr>

<head>
    <title>Accueil</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reservation_paiement.css">
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
        <?php
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
        ?>

        <?php
        $visa = isset($_GET['visa']) ? $_GET['visa'] : '';
        $id_diffusion = isset($_GET['id_diffusion']) ? (int)$_GET['id_diffusion'] : 0;
        
        if (empty($visa) || $id_diffusion === 0) {
            die('Erreur: Paramètres requis non spécifiés.');
        }
        

        $sql = "SELECT f.visa, f.titre, f.image, d.heureDebut, d.heureFin, d.langue, s.nom_salle, p.prix, p.type
                FROM film f
                JOIN diffuser d ON f.visa = d.visa
                JOIN salle s ON d.id_salle = s.id_salle
                JOIN prix p ON d.id_diffusion = p.id_diffusion
                WHERE f.visa = ? AND d.id_diffusion = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $visa, $id_diffusion);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if (!$row) {
            echo "Aucune réservation trouvée pour ces critères.";
            $conn->close();
            exit;
        }
        ?>


            <div class="reservation">
                <h1 class="titre">RÉSERVATION</h1>
                <div class="movie-info">
                    <div class="movie-poster">
                        <img src="<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['titre']) ?>">
                    </div>
                    <div class="movie-details">
                        <div class="details1">
                            <h2><?= htmlspecialchars($row['titre']) ?></h2>
                            <p class="lieu">Salle <?= htmlspecialchars($row['nom_salle']) ?></p>
                        </div>
                        <div class="details2">
                            <p class="date"><?= date('H:i', strtotime($row['heureDebut'])) ?></p>
                            <p class="heureFin">(fin <?= date('H:i', strtotime($row['heureFin'])) ?>)</p>
                            <p><?= htmlspecialchars($row['langue']) ?></p>
                        </div>
                    </div>
                </div>
            </div>



        <?php
        $conn->close();
        ?>



                




        <!-- <div class="reservation">
            <h1 class = "titre">RÉSERVATION</h1>
            <div class="movie-info">
                <div class="movie-poster">
                    <img src="../images/affiche_civil_war.jpg" alt="Civil War">
                </div>
                <div class="movie-details">
                    <div class="details1">
                        <h2>Civil War</h2>
                        <p class = "lieu">UGC CINE ISSY</p>
                        <p class = "lieu">Salle 30</p>
                        <p class = "prix">1 place - 5,00 euros</p>
                    </div>
                    <div class="details2">
                        <p class = "date">15/04</p>
                        <p class = "date">17:00</p>
                        <p class = "heureFin">(fin 19h15)</p>
                        <p>VOSFR</p>
                        
                    </div>
                </div>
            </div>
        </div>-->
        <div class="infoG">
            <div class="info">
                <h2>Informations personnelles</h2>
                <div class="personal-info">
                        <input type="text" placeholder="NOM" name="lastname" required>
                        <input type="text" placeholder="PRÉNOM" name="firstname" required>
                        <input type="email" placeholder="EMAIL" name="email" required>
                </div>
            </div>
        
            <div class="promo">
                <p>CODE PROMO</p>
                <input type="text" placeholder="Entrer un code promo">
                <button>OK</button>
            </div>
        </div>
        <select name="type" required>
                    <option value="DEFAULT">SENIOR - 8 €</option>
                    <option value="OWNER">JUNIOR - 5 €</option>
                    <option value="ADMIN">NORMAL - 10 €</option>
                </select>
        <div class="info_bancaire">
                <h2>Informations bancaires</h2>
                <div class="infoB">
                        <input type="text" placeholder="Numero de carte" name="carte" required>
                        <input type="text" placeholder="Date d'expiration" name="date_expiration" required>
                        <input type="text" placeholder="Code CCV" name="CCV" required>
                        <button>Payer par carte</button>
                </div>
        </div> 


    </main>
    <?php 
    include '../footer.php';
    ?>

</body>

</html>