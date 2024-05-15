<!DOCTYPE html>
<html lang fr>

<head>
    <title>Films et séances</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="films_cinema.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="films_cinema.js" defer></script>
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
        <div class="container1">
            <div class="container1-2">
                <p><Strong>SoundOnAir aime <span>DUNE</span></Strong></p>
            </div>
        </div>
        <div class="choix-film">
            <p> <Strong> Les séances dans mon cinéma</Strong></p>
            <div class="recherche">
                <input type="text" placeholder="Choisir un film">
                <button><span>Chercher</span></button>
            </div>
        </div>

    <div class="wrapper">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <ul class="carouse1">
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

            // Requête pour récupérer la liste des films
            $sql = "SELECT * FROM film";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Afficher les films
                while($row = $result->fetch_assoc()) {
                    $film_visa = $row["visa"];
                    $titre = $row["titre"];
                    $image = $row["image"];
                    echo "<li class='card'>";
                    echo "<a href='../reservation_films/film_reservation.php?visa=$film_visa'>";
                    echo "<div class='img'><img src='$image' alt='$titre' draggable='false'></div>";
                    echo "<h2>$titre</h2>";
                    echo "</a>";
                    echo "</li>";
                }
            } else {
                echo "Aucun film trouvé.";
            }

            // Fermer la connexion à la base de données
            $conn->close();
            ?>
        </ul>
        <i id="right" class="fa-solid fa-angle-right"></i>
    </div>

    

        <!-- <div class="wrapper">
            <i id="left" class="fa-solid fa-angle-left"></i>
            <ul class="carouse1">
                <li class="card">
                    <a href="../reservation_films/civil_war.php">
                        <div class="img"><img src="../images/affiche_civil_war.jpg" alt="affiche_civil_war" draggable="false"></div>
                        <h2>Civil War</h2>
                    </a>
                </li>
                <li class="card">
                    <div class="img"><img src="../images/affiche_dune.jpg" alt="affiche_dune" draggable="false"></div>
                    <h2>Dune 2</h2>
                </li>
                <li class="card">
                    <a href="../reservation_films/fall_guy.php">
                        <div class="img"><img src="../images/affiche_fall_guy.jpg" alt="affiche_fall_guy" draggable="false"></div>
                        <h2>Fall guy</h2>
                    </a>
                </li>
                <li class="card">
                    <div class="img"><img src="../images/affiche_godzilla_kong.jpg" alt="affiche_godzilla_kong" draggable="false"></div>
                    <h2>Godzilla X Kong</h2>
                </li>
                <li class="card">
                    <div class="img"><img src="../images/affiche_monkey_man.jpg" alt="affiche_godzilla_kong" draggable="false"></div>
                    <h2>Monkey Man</h2>
                </li>
                <li class="card">
                    <div class="img"><img src="../images/affiche_kung_fu_panda.jpg" alt="affiche_kung_fu_panda" draggable="false"></div>
                    <h2>Kung Fu Panda 4</h2>
                </li>
                <li class="card">
                    <div class="img"><img src="../images/affiche_une_vie.jpg" alt="affiche_une_vie" draggable="false"></div>
                    <h2>Une vie</h2>
                </li>
                <li class="card">
                    <a href="../reservation_films/planetes_4.php">
                        <div class="img"><img src="../images/Affiche_planete_des_singes.jpg" alt="Affiche_planete_des_singes" draggable="false"></div>
                        <h2>Planètes des singes 4</h2> 
                    </a> 
                </li>
                <li class="card">
                    <div class="img"><img src="../images/affiche_vice_versa_2.jpg" alt="affiche_vice_versa_2" draggable="false"></div>
                    <h2>Vice-Versa 2</h2>
                </li>
            </ul>
            <i id="right" class="fa-solid fa-angle-right"></i>
        </div>-->
        <div class="news">
            <h2>DERNIERES NEWS</h2>
            <div class="festival">
                <h3><Strong>LA SÉLECTION OFFICIELLE DU 77E FESTIVAL DE CANNES</Strong></h3>
                <div class="text">
                    <img src="../images/news.png" alt="festival">
                    <p>La sélection officielle du 77e Festival de Cannes, qui se déroulera du 14 au 25 mai, vient d'être
                        dévoilée dans sa quasi totalité par Iris Knobloch, Présidente de Festival et Thierry Frémaux,
                        délégué général, à l'UGC Grand Normandie.</p>
                </div>
            </div>
        </div>


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
    <script src="films_cinema.js" defer></script>
</body>

</html>