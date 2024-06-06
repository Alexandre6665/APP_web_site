<?php
session_start();
session_unset();
session_destroy();
header("Location: ../event/films_cinema.php");
exit();
?>
