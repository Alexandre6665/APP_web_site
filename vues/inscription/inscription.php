<!DOCTYPE html>
<html lang fr>

<head>
    <title>Inscription</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inscription.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="../controleurs/inscriptionForm.php">
</head>

<body>
    <?php 
    $lastName = isset($_GET['lastName']) ? $_GET['lastName'] : '';
    $firstName = isset($_GET['firstName']) ? $_GET['firstName'] : '';
    $mail = isset($_GET['mail']) ? $_GET['mail'] : '';
    $add = isset($_GET['add']) ? $_GET['add'] : '';
    $postal = isset($_GET['postal']) ? $_GET['postal'] : '';
    $city = isset($_GET['city']) ? $_GET['city'] : '';
    $birth = isset($_GET['birth']) ? $_GET['birth'] : '';
    ?>

    <header class="header">
        <a class="logo" href="../accueil/accueil.php"><img src="../images/Logo_SoundOnAir.png" alt="Logo" width="130px"
                height="20px"></a>

        <nav class="navbar">
            <button><a href="../accueil/accueil.php"><span>ACCUEIL</span></a></button>
            <div class="dropdown">
                <button><a href=""><span>NOS SERVICES</span></a>
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
                <button><a href=""><span>COMPTE</span></a>
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
        <div class="creation">
            <h2>Inscription</h2>
            <hr>
            <form action="traitement.php" method="post" autocomplete="off">
                <input type="text" name="lastName" placeholder="NOM" value="<?php echo $lastName; ?>" required>
                <input type="text" name="firstName" placeholder="PRÉNOM" value="<?php echo $firstName; ?>" required>
                <input type="text" name="add" placeholder="ADRESSE" value="<?php echo $add; ?>" required>
                <input type="text" name="postal" placeholder="CODE POSTAL" value="<?php echo $postal; ?>" required>
                <input type="text" name="city" placeholder="VILLE" value="<?php echo $city; ?>" required>
                <input type="text" name="birth" placeholder="DATE DE NAISSANCE" value="<?php echo $birth; ?>" required>
                <input type="email" name="mail" placeholder="EMAIL" value="<?php echo $mail; ?>" required>
                <select name="role" required>
                    <option value="DEFAULT">DEFAULT</option>
                    <option value="OWNER">OWNER</option>
                    <option value="ADMIN">ADMIN</option>
                </select>
                <input type="password" name="pwd" placeholder="MOT DE PASSE" required>
                <input type="password" name="cPwd" placeholder="CONFIRMER VOTRE MOT DE PASSE" required>
                <div class="checkbox-container">
                    <input type="checkbox" name="checkCG" id="checkCG" required>
                    <label for="checkCG">Accepter nos conditions générales</label>
                </div>
                <input type="submit" name="send" id="send" value="Inscrivez-vous">
            </form>
            <p>Vous avez déjà un compte ? <br><a href="../connexion/connexion.php">Connectez-vous
                    ici !</a></p>
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