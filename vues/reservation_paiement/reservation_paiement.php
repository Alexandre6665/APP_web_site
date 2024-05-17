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
        
        <h1>RÉSERVATION</h1>
        <div class="movie-info">
            <div class="movie-poster">
                <img src="../images/affiche_civil_war.jpg" alt="Civil War">
            </div>
            <div class="movie-details">
                <h2>LE ROYAUME DES ABYSSES</h2>
                <p>UGC CINE ISSY</p>
                <p>Salle 30</p>
                <p>15/04 - 17:00</p>
                <p>1 place - 5,00 euros</p>
            </div>
        </div>
        <h2>Informations personnelles</h2>
        <div class="personal-info">
            <div class="input-field">
                <input type="text" placeholder="NOM" name="lastname" required>
            </div>
            <div class="input-field">
                <input type="text" placeholder="PRÉNOM" name="firstname" required>
            </div>
            <div class="input-field">
                <input type="email" placeholder="EMAIL" name="email" required>
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