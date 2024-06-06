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
    
    include '../header.php';
    ?>
    
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
                <input type="text" name="birth" placeholder="DATE DE NAISSANCE (MM/JJ/AAAA)" value="<?php echo $birth; ?>" required>
                <input type="email" name="mail" placeholder="EMAIL" value="<?php echo $mail; ?>" required>
                <select name="type" required>
                    <option value="DEFAULT">DEFAULT</option>
                    <option value="OWNER">OWNER</option>
                    <option value="ADMIN">ADMIN</option>
                </select>
                <input type="password" name="pwd" placeholder="MOT DE PASSE (8 caractères ou plus)" required>
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
    <?php
    include '../footer.php';
    ?>
</body>

</html>