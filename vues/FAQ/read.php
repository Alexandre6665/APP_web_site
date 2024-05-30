<?php
include 'connectToDB_faq.php';

$sql = "SELECT * FROM faq";
$stmt = $bdd->prepare($sql);
$stmt->execute();
$faqs = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FAQ</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>FAQ</h1>
    <a href="create.html">Ajouter une FAQ</a>
    <ul>
        <?php foreach ($faqs as $faq): ?>
            <li>
                <h2><?php echo htmlspecialchars($faq['question']); ?></h2>
                <p><?php echo htmlspecialchars($faq['answer']); ?></p>
                <a href="update.php?id=<?php echo $faq['id']; ?>">Modifier</a>
                <a href="delete.php?id=<?php echo $faq['id']; ?>">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>