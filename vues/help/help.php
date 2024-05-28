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
    <?php
    include '../header.php';
    ?>
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
    <?php 
    include '../footer.php';
    ?>

</body>

</html>