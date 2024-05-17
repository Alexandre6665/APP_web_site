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
        <div class="reservation">
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
        </div>
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