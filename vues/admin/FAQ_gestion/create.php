<?php
include 'connectToDB_faq.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    $sql = "INSERT INTO faq (question, answer) VALUES (?, ?)";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(array($question, $answer));

    header("Location: faq_admin.php");
}
?>