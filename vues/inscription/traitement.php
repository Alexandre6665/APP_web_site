<?php
$serv = "localhost";
$un = "root";
$pwd = "";
$db = "maindb";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


try {
    
    $bdd = new PDO("mysql:host=$serv;dbname=$db", $un, $pwd);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST['send'])) {
        $lastName = $_POST["lastName"];
        $firstName = $_POST["firstName"];
        $mail = $_POST["mail"];
        $address = $_POST["add"];
        $postal = $_POST["postal"];
        $city = $_POST["city"];
        $birth = date('Y-m-d', strtotime($_POST["birth"]));
        $pwd = $_POST["pwd"];
        $cPwd = $_POST["cPwd"];
        $type = $_POST["type"];
        
        $duplicate = $bdd->prepare("SELECT COUNT(*) AS count FROM spectateur WHERE mail = :mail");
        $duplicate->execute(array(':mail' => $mail));
        $result = $duplicate->fetch(PDO::FETCH_ASSOC);
        

        if($pwd == $cPwd /*&& strlen($pwd) >= 8*/ && $result['count'] == 0 && ($type == 'OWNER' || $type == 'DEFAULT' || $type=='ADMIN')) {
            //Débuggage
           //echo "Error";
           
            //Insertion dans la table compte
            $req_primary = $bdd->prepare("INSERT INTO compte(mail, pwd, types) VALUES(:mail, MD5(:pwd), :types)");
            
            $req_primary->execute(array(
                'mail' => $mail,
                'pwd' => $pwd,
                'types' => $type
            ));

            //Récupération de l'ID généré automatiquement dans la table compte
            $id_compte = $bdd->lastInsertID();

            //Insertion dans la table spectateur
            $req = $bdd->prepare("INSERT INTO spectateur(nom, prenom, adresse, code_postal, ville, date_naissance, mail, id_compte) VALUES(:nom, :prenom, :adresse, :code_postal, :ville, :date_naissance, :mail, :id_compte)");
            $req->execute(array(
            'nom' => $lastName,
            'prenom' => $firstName,
            'adresse' => $address,
            'code_postal' => $postal,
            'ville' => $city,
            'date_naissance' => $birth,
            'mail' => $mail,
            'id_compte' => $id_compte

            
        ));
        echo 
        "
            <script>
                alert('Vous avez bien été inscrit. Vous allez être redirigé vers la page de connexion.');
                setTimeout(function() {
                    window.location.href = '../connexion/connexion.php';
                }, 50);
            </script>
        ";

        }
        elseif($pwd != $cPwd) {
            $redirectUrl = "inscription.php?lastName=$lastName&firstName=$firstName&mail=$mail&add=$address&postal=$postal&city=$city&birth=$birth&type=$type";
            echo 
            "
            <script>
                alert('Les mots de passe ne correspondent pas');
                setTimeout(function() {
                    window.location.href = '$redirectUrl';
                }, 50);
            </script>";
        }
        
        /*elseif(strlen($pwd) < 8) {
            $redirectUrl = "inscription.php?lastName=$lastName&firstName=$firstName&mail=$mail&add=$address&postal=$postal&city=$city&birth=$birth";
            echo 
            "
            <script>
                alert('Votre mot de passe est trop court');
                setTimeout(function() {
                    window.location.href = '$redirectUrl';
                }, 50);
            </script>";

        }*/

        elseif($result['count'] > 0) {
            $redirectUrl = "inscription.php?lastName=$lastName&firstName=$firstName&mail=$mail&add=$address&postal=$postal&city=$city&birth=$birth";
            echo 
            "
            <script>
                alert('Un compte existant est déjà associé cette adresse e-mail. Veuillez en saisir une autre.');
                setTimeout(function() {
                    window.location.href = '$redirectUrl';
                }, 50);
            </script>";

        }

        elseif($type!='OWNER' && $type!='ADMIN' && $type!='DEFAULT') {
            $redirectUrl = "inscription.php?lastName=$lastName&firstName=$firstName&mail=$mail&add=$address&postal=$postal&city=$city&birth=$birth";
            
            echo 
            "
            <script>
                alert('Le type de compte que vous avez saisi n'est pas valide. Veuillez le ressaisir.');
                setTimeout(function() {
                    window.location.href = '$redirectUrl';
                }, 50);
            </script>";
        }
        
    }

}
catch(PDOException $e){
    echo "error";
    //$sql . "<br>" . $e->getMessage();
    echo "<br>" . $e->getMessage();

}



?>