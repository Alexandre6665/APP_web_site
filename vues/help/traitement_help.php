<?php
$serv = "localhost";
$un = "root";
$pwd = "";
$db = "maindb";

try {
    $bdd = new PDO("mysql:host=$serv;dbname=$db", $un, $pwd);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} 

catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

if(isset($_POST['send'])) {
    // Récupération des données du formulaire
    $nom = $_POST['lastName'];
    $prenom = $_POST['firstName'];
    $email = $_POST['mail'];
    $objet = $_POST['object'];
    $message = $_POST['content'];

    // Requête d'insertion des données dans la table message
    $insertQuery = "INSERT INTO message (nom, prenom, mail, objet, content) VALUES (:nom, :prenom, :mail, :objet, :content)";
    $stmt = $bdd->prepare($insertQuery);
    
    try {
        // Exécution de la requête avec les valeurs des champs input
        $stmt->execute(array(
            'nom'=>$nom, 
            'prenom'=>$prenom, 
            'mail'=>$email,
            'objet'=>$objet,
            'content'=>$message
        ));
        echo 
            "
                <script>
                    alert('Vous avez bien été inscrit. Vous allez être redirigé vers la page de connexion.');
                    setTimeout(function() {
                        window.location.href = '../event/films_cinema.php';
                    }, 50);
                </script>
            ";
    } catch (PDOException $e) {
        echo "Erreur lors de l'envoi du message : " . $e->getMessage();
    }
}
?>
