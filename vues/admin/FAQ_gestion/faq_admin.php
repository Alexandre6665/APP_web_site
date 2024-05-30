<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gestion FAQ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="faq_admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    
</head>
<body>
    <?php 
    include '../header_admin.php';
    ?>
    <main>
        <h1>Gestion de la F.A.Q</h1>
        <hr>
        <?php
        $serv = "localhost";
        $un = "root";
        $pwd = "";
        $db = "maindb";


        try {
            $conn = new PDO("mysql:host=$serv;dbname=$db", $un, $pwd);
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }

        // Ajouter une FAQ
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_faq'])) {
            $question = $_POST['question'];
            $answer = $_POST['answer'];
            $sql = "INSERT INTO faq (question, answer) VALUES (:question, :answer)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':question', $question);
            $stmt->bindParam(':answer', $answer);
            if ($stmt->execute()) {
                echo "Nouvelle FAQ ajoutée avec succès";
            } else {
                echo "Erreur lors de l'ajout de la FAQ";
            }
        }

        // Supprimer une FAQ
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_faq'])) {
            $id = intval($_POST['id']);
            $sql = "DELETE FROM faq WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            if ($stmt->execute()) {
                echo "FAQ supprimée avec succès";
            } else {
                echo "Erreur lors de la suppression de la FAQ";
            }
        }

        // Modifier une FAQ
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_faq'])) {
            $id = intval($_POST['id']);
            $question = $_POST['question'];
            $answer = $_POST['answer'];
            $sql = "UPDATE faq SET question = :question, answer = :answer WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':question', $question);
            $stmt->bindParam(':answer', $answer);
            if ($stmt->execute()) {
                echo "FAQ modifiée avec succès";
            } else {
                echo "Erreur lors de la modification de la FAQ";
            }
        }

        // Récupérer toutes les FAQs
        $sql = "SELECT * FROM faq";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $faqs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <!-- Formulaire pour ajouter une FAQ -->
        <form method="POST">
            <h2>Ajouter une nouvelle FAQ</h2>
            <label for="question">Question:</label>
            <input type="text" id="question" name="question" required>
            <label for="answer">Réponse:</label>
            <textarea id="answer" name="answer" required></textarea>
            <button type="submit" name="add_faq">Ajouter</button>
        </form>

        <hr>

        <!-- Liste des FAQs avec options de modification et suppression -->
        <h2>Liste des FAQs</h2>
        <?php if (count($faqs) > 0): ?>
            <ul>
                <?php foreach ($faqs as $faq): ?>
                    <li>
                        <strong><?php echo htmlspecialchars($faq['question']); ?></strong>
                        <p><?php echo htmlspecialchars($faq['answer']); ?></p>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $faq['id']; ?>">
                            <button type="submit" name="delete_faq">Supprimer</button>
                        </form>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $faq['id']; ?>">
                            <label for="question">Question:</label>
                            <input type="text" name="question" value="<?php echo htmlspecialchars($faq['question']); ?>" required>
                            <label for="answer">Réponse:</label>
                            <textarea name="answer" required><?php echo htmlspecialchars($faq['answer']); ?></textarea>
                            <button type="submit" name="edit_faq">Modifier</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Aucune FAQ trouvée.</p>
        <?php endif; ?>

    </main>
    <?php
    include '../footer_admin.php';
    ?>
    
</body>
</html>