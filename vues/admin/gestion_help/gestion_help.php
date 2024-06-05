<!DOCTYPE html>
<html lang fr>
<head>
    <title>Message</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gestion_help.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php
    include '../header_admin.php';
    ?>

    <main>
        <h1>Liste des messages</h1>
        <hr>
        <?php
        include 'connectToDB_help.php';
        ?>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Objet</th>
                <th>Contenu</th>
            </tr>
            <?php
            // Requête pour sélectionner toutes les lignes de la table message
            $selectQuery = "SELECT nom, prenom, mail, objet, content FROM message";
            $stmt = $bdd->query($selectQuery);

            // Affichage des résultats dans le tableau
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['nom'] . "</td>";
                echo "<td>" . $row['prenom'] . "</td>";
                echo "<td>" . $row['mail'] . "</td>";
                echo "<td>" . $row['objet'] . "</td>";
                echo "<td>" . $row['content'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    
    </main>

<?php 
include '../footer_admin.php';
?>

</body>