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

        <div class="form-container">
        <form id="faq-form">
            <input type="hidden" id="faq-id">
            <label for="question">Question:</label>
            <input type="text" id="question" name="question" required>
            <label for="rep">Answer:</label>
            <textarea id="rep" name="rep" required></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>

    <div class="faq-container">
        <h2>FAQs</h2>
        <div id="faq-list"></div>
    </div>

    <script src="script.js"></script>

    </main>
    <?php
    include '../footer_admin.php';
    ?>
    
</body>
</html>