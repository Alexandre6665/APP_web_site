<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gestion FAQ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="faq_admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="richtext/richtext.min.css" />
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="richtext/jquery.richtext.js"></script>
</head>
<body>
    <?php 
    include '../header_admin.php';
    ?>
    <main>
        <h1>Gestion de la F.A.Q</h1>
        <hr>
        <div class="container">
            <div class="row">
                <h1 class="text-center">Ajouter une FAQ</h1>
                <form action="ajout_faq.php" method="POST">
                <div class="form-group">
                    <label>Saisir une question</label>
                    <input type="text" name="question" class="form-control" required>
                </div>
                <div class="form-group">
                <label>Saisir la réponse</label>
                <textarea name="rep" id="rep" class="form-control" required></textarea>
                <input type="submit" name="submit" class="btn" value="Ajouter la FAQ">
            </div>
        </form>
    </div>
</div>
    </main>
    <?php
    include '../footer_admin.php';
    ?>
    
</body>
</html>