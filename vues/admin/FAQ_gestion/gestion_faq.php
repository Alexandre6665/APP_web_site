<?php 
$serv = "localhost";
$un = "root";
$pwd = "";
$db = "maindb";

try {
    $bdd = new PDO("mysql:host=$serv;dbname=$db", $un, $pwd);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo $e->getMessage();
}

// Déterminer l'action (ajouter, supprimer)
$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'créer' :
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $question = $_POST["question"];
            $rep = $_POST[rep];

            $stmt_1 = $bdd->prepare("INSERT INTO faq (question, rep) VALUES (:question, :rep)");
            $stmt_1->execute(array(
                'question' => $question,
                'rep' => $rep
            ));
            if ($stmt_1->execute(array('question'=>$question, 'rep'=>$rep))) {
                echo 
            "
                <script>
                    alert('La FAQ a bien été créée.');
                    setTimeout(function() {
                        window.location.href = 'faq_admin.php';
                    }, 50);
                </script>
            ";
            } else {
                echo "Erreur: " . implode(", ", $stmt->errorInfo());
            }
        }
        break;
    
    case 'lire' :
        $stmt_1 = $bdd->query("SELECT $ FROM faq");
        $faqs = $stmt_1->fecthAll(PDO::FETCH_ASSOC);
        echo json_encode($faqs);
        break;
    
    case 'mettre à jour' :
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id_faq"];
            $question = $_POST["question"];
            $rep = $_POST["rep"];

            $stmt_1 = $bdd->prepare("UPDATE faq SET question = :question, rep = :rep, WHERE :id_faq = $id");
            $stmt_1->execute(array(
                'question' => $question,
                'rep' => $rep,
                'id_faq' => $id
            ));
            if ($stmt_1->execute(array('question' => $question, 'rep' => $rep, 'id_faq' => $id))) {
                echo 
            "
                <script>
                    alert('La FAQ a bien été mise à jour.');
                    setTimeout(function() {
                        window.location.href = 'faq_admin.php';
                    }, 50);
                </script>
            ";
            } else {
                echo "Erreur: " . implode(", ", $stmt->errorInfo());
            }
        }
        break;

    case 'supprimer' :
        if ($_SERVER("REQUEST_METHOD") == "POST") {
            $id = $_POST["id_faq"];
            
            $stmt_1 = $bdd->prepare("DELETE FROM faq WHERE id_faq = :id_faq");
            $stmt_1->execute(array(
                ':id' => $id
            ));
            if ($stmt_1 = execute(array(':id' => $id))) {
                echo 
            "
                <script>
                    alert('La FAQ a bien été supprimé.');
                    setTimeout(function() {
                        window.location.href = 'faq_admin.php';
                    }, 50);
                </script>
            ";
            } else {
                echo "Erreur: ".implode(",",$stmt_1->errorInfo());
            }
        }
        break;

    case 'défaut' :
        echo
        "
                <script>
                    alert('Action invalide.');
                    setTimeout(function() {
                        window.location.href = 'faq_admin.php';
                    }, 50);
                </script>
        ";
        break;
}
$bdd = null;

?>