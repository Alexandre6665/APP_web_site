<!DOCTYPE html>
<html lang fr>

<head>
    <title>Films et séances</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fall_guy.css">
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
        <div class="container1">
            <img src="../images/affiche_fall_guy.jpg" alt="fall guy">
            <div class="info">
                <h1>FALL GUY</h1>
                <p>De David Leitch</p>
                <p>Sortie le 1er Mai 2024</p>
                <p>Action, Comédie, Drame  (2h06)</p>
                <h2>Avertissement</h2>
                <p>Ce film contient des scènes de violence et de suspense qui peuvent ne pas convenir à tous les publics. La supervision parentale est recommandée pour les jeunes spectateurs.</p>
                
            </div>
        </div>
        <div class="synopsis">
            <h1>Synopsis</h1>
            <p>C'est l'histoire d'un cascadeur, et comme tous les cascadeurs, il se fait tirer dessus, exploser, écraser, jeter par les fenêtres et tombe toujours de plus en plus haut… pour le plus grand plaisir du public. Après un accident qui a failli mettre fin à sa carrière, ce héros anonyme du cinéma va devoir retrouver une star portée disparue, déjouer un complot et tenter de reconquérir la femme de sa vie tout en bravant la mort tous les jours sur les plateaux. Que pourrait-il lui arriver de pire ?</p>
        </div>
        <div class="reservation">
            <h1>UGC CINE ISSY</h1>
            <div class="reservation1">
                <a href="#">
                <div class="reservation1-2">
                    <h2>VOSFR</h2>
                    <p>17:00</p>
                    <p>(fin 19:15)</p>
                    <div class="salle">
                        <p><strong>Salle 2</strong></p>
                    </div>
                </div></a>
                <a href="#">
                <div class="reservation1-3">
                    <h2>VOSFR</h2>
                    <p>19:30</p>
                    <p>(fin 21:45)</p>
                    <div class="salle">
                        <p><strong>Salle 3</strong></p>
                    </div>
                </div></a>
                <a href="#">
                <div class="reservation1-3">
                    <h2>VF</h2>
                    <p>21:55</p>
                    <p>(fin 00:10)</p>
                    <div class="salle">
                        <p><strong>Salle 4</strong></p>
                    </div>
                </div></a>
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