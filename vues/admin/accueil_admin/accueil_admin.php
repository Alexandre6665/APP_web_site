<!DOCTYPE html>
<html lang fr>

<head>
    <title>Accueil</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accueil.css">
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
        <div class="container1">
            <div class="container1-2">
                <p><Strong>POUR LE MEILLEUR DES CONFORTS</Strong> <br><strong>AUDITIFS</strong></p>
                <button><a href="../event/films_cinema.php">Achetez vos billets</a></button>
            </div>
        </div>

        <div class="container2">
            <div class="france">
                <img src="../images/france.png" alt="Drapeau Français">
                <figcaption><strong>Fabriqué en France</strong></figcaption>
            </div>
            <div class="europeen">
                <img src="../images/logo_europeen.png" alt="Drapeau Européens">
                <figcaption><strong>Matériaux européens</strong></figcaption>
            </div>
        </div>

        <div class="equipe">
            <p>Photo equipe</p>

        </div>
    </main>
    <?php 
    include '../footer.php';
    ?>
</body>

</html>