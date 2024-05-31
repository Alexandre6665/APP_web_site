<!DOCTYPE html>
<html lang="en">
<head>
    <title>FAQ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="faq_spectateur.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include '../header.php'; ?>
    <main>
        <h1>FAQ</h1>
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


        $sql = "SELECT * FROM faq";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $faqs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <?php if (count($faqs) > 0): ?>
            <ul>
                <?php foreach ($faqs as $faq): ?>
                    <li>
                        <strong><?php echo htmlspecialchars($faq['question']); ?></strong>
                        <p><?php echo htmlspecialchars($faq['answer']); ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Aucune FAQ trouvée.</p>
        <?php endif; ?>

    </main>
    <?php include '../footer.php'; ?>
</body>
</html>
