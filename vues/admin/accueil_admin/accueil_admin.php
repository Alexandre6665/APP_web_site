<!DOCTYPE html>
<html lang fr>
<head>
    <title>Administrateur</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accueil_admin.css">
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
        include 'connectToDB.php';

        try {

            $stmt = $bdd->prepare("SELECT nom, prenom, adresse, code_postal, ville, date_naissance, mail, id_compte FROM spectateur");
            $stmt->execute();

            echo "<table border='1' style='width:100%; text-align:left;'>";
            echo "<tr><th>Nom</th><th>Prénom</th><th>Adresse</th><th>Code Postal</th><th>Ville</th><th>Date de Naissance</th><th>Mail</th></tr>";

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
                echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
                echo "<td>" . htmlspecialchars($row['adresse']) . "</td>";
                echo "<td>" . htmlspecialchars($row['code_postal']) . "</td>";
                echo "<td>" . htmlspecialchars($row['ville']) . "</td>";
                echo "<td>" . htmlspecialchars($row['date_naissance']) . "</td>";
                echo "<td>" . htmlspecialchars($row['mail']) . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn = null;
        ?>
        
    </main>

    <?php 
    include '../footer_admin.php';
    ?>
</body>

</html>