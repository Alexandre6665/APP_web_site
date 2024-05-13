<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
    $serv = "localhost";
    $un = "root";
    $pwd = "";
    $db = "maindb";
    
    try {
        $bdd = new PDO("mysql:host=$serv;dbname=$db", $un, $pwd);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mail = $_POST['mail'];
        $pwd = $_POST['pwd'];

        if($mail != "" && $pwd != ""){
            $req = $bdd->query("SELECT * FROM spectateur WHERE mail = '$mail' AND pwd = '$pwd'");
            $rep = $req->fetch();
            echo 
                "
                <script>
                    alert('Vous vous êtes bien connecté. Vous allez être redirigé vers la page d'accueil.');
                        setTimeout(function() {
                        window.location.href = '../accueil/accueil.php';
                        }, 50);
                </script>
                ";
        }
        else {
            $error_message = "Email ou mot de passe incorrect.";
        }

    }

    ?>
