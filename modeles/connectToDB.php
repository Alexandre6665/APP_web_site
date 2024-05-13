<?php
$serv = "localhost";
$un = "root";
$pwd = "";
$db = "maindb";

try {
    $bdd = new PDO("mysql:host=$serv;dbname=$db", $un, $pwd);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /* 
    $sql = "INSERT INTO billet (id_billet, id_prix, id_diffusion, visa)
    VALUES (0, 0, 0, 0)";
    $bdd->exec($sql);
    */
    echo "Connexion réussie !".'<br>';
}
catch(PDOException $e){
    /*echo $sql . "<br>" . $e->getMessage();*/
    echo "Erreur : ".$e->getMessage();
}

$bdd = null;
?>