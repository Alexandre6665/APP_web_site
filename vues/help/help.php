<!DOCTYPE html>
<html lang fr>

<head>
    <title>Aide</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <link rel="stylesheet" href="help.css">
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
            <!--Lien page Accueil-->
            <button><a href="../accueil/accueil.php"><span>ACCUEIL</span></a></button>
            <div class="dropdown">
                <button><a href=""><span>NOS SERVICES</span></a>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <!--Lien page Films et séances-->
                    <a href="../event/films_cinema.php">Films et séances</a>
                    <!--Lien page Nos cinémas-->
                    <a href="#">Nos cinémas</a>
                </div>
            </div>
            <button><a href="#"><span>A PROPOS DE NOUS</span></a></button>
            <!--Lien page A PROPOS DE NOUS-->

            <button>
                <!--Lien page Aide-->
                <a href="../help/help.php"><span>CONTACT</span></a>
            </button>
            <div class="dropdown">
                <button><a href="#"><span>COMPTE</span></a>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <!--Lien page Inscription-->
                    <a href="../inscription/inscription.php">Inscription</a>
                    <!--Lien page de Connexion-->
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
        <div class="creation">
            <h2>Contactez-nous</h2>
            <hr>
            <p>Pour nous contacter, veuillez remplir le formulaire ci-dessous.</p>
            <p>Votre message sera transmis au service concerné qui traitera votre demande dans le meilleur délai.
            </p>
            <form>
                <input type="text" placeholder="Nom">
                <input type="text" placeholder="Prenom">
                <input type="text" placeholder="Email">
                <input type="text" placeholder="Objet">
                <textarea name="" id="" cols="30" rows="10" placeholder="Message"></textarea>
                <input type="submit" value="Envoyer">
            </form>
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