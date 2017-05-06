<?php

include '../controller/CreateQuizOperations.php';

session_start();

$doctorID = $_SESSION['userid'];
$doctorName = $_SESSION['username'];

$fullMark = $_GET['fullmark'];
$password = $_GET['password'];
$quizName = $_GET['quizname'];

$quizID = CreateQuizOperations::getQuizID($doctorName);
CreateQuizOperations::addQuizFullInfo($quizID, $quizName, $doctorID, $password, $fullMark, $doctorName);

echo '<script>document.location.href="DoctorHome.php?"</script>';
