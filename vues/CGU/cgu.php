<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Conditions Générales d'Utilisation (CGU)</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cgu.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    include '../header.php';
    
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "maindb"; 


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    $sql = "SELECT titre, texte FROM cgu";
    $result = $conn->query($sql);
    ?>

    <main>
        <h1>Conditions Générales d'Utilisation (CGU)</h1>
        <hr>
        <div class="texte">
            <?php
            if ($result->num_rows > 0) {
                // Afficher les résultats
                while($row = $result->fetch_assoc()) {
                    echo '<p class="sous_titre">' . htmlspecialchars($row["titre"]) . '</p>';
                    echo '<p>' . nl2br(htmlspecialchars($row["texte"])) . '</p>';
                }
            } else {
                echo "Aucune donnée trouvée.";
            }
            $conn->close();
            ?>
        </div>
    </main>
    <?php 
    include '../footer.php';
    ?>
</body>
</html>