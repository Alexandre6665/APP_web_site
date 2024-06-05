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
    <h1>Liste des utilisateurs</h1>
    <hr>
    <?php
    include 'connectToDB_help.php';
    $sql = 'SELECT id_message, nom, prenom, mail, objet, content FROM message';
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Objet</th><th>Message</th></tr>';
        
        // Afficher les résultats
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['id_message']) . '</td>';
            echo '<td>' . htmlspecialchars($row['nom']) . '</td>';
            echo '<td>' . htmlspecialchars($row['prenom']) . '</td>';
            echo '<td>' . htmlspecialchars($row['mail']) . '</td>';
            echo '<td>' . htmlspecialchars($row['objet']) . '</td>';
            echo '<td>' . htmlspecialchars($row['content']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Aucun message trouvé.';
    }
    ?>
</main>
<?php 
include '../footer_admin.php';
?>
</body>