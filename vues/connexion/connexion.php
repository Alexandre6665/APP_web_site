<!DOCTYPE html>
<html lang fr>

<head>
    <title>Connexion</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connexion.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    include 'traitement_login.php';
    include '../header.php';
    ?>

    <main>
        <div class="creation">
            <h2>Connexion</h2>
            <hr>
            <form method="POST" action="traitement_login.php">
                <input type="text" placeholder="EMAIL" name="mail" id="mail">
                <input type="password" placeholder="MOT DE PASSE" name="pwd" id="pwd">
                <input type="submit" value="Connectez-vous" name="connect">
            </form>
            <p>Vous n'avez pas encore de compte ? <br><a href="../inscription/inscription.php">Créez
                    en un ici !</a></p>

                    <?php
                    if (isset($error_message)) {
                        echo "<p style='color:red;'>$error_message</p>";
                    }
                    ?>
                    
        </div>
    </main>
    <?php 
    include '../footer.php';
    ?>
</body>

</html>