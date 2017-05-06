<?php

include '../controller/CreateQuizOperations.php';
session_start();
$user = $_SESSION['username'];
$quizID = CreateQuizOperations::getQuizID($user);
CreateQuizOperations::deleteQuiz($quizID);

echo '<script>document.location.href="DoctorHome.php?"</script>';
