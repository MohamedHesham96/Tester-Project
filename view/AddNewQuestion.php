<?php

include '../controller/CreateQuizOperations.php';

session_start();

$quizID = CreateQuizOperations::getQuizID($_SESSION['username']);



$header = $_GET['question'];
$ans1 = $_GET['ans1'];
$ans2 = $_GET['ans2'];
$ans3 = $_GET['ans3'];
$ans4 = $_GET['ans4'];

$corectAns = $_GET['correctans'];

$quizID = CreateQuizOperations::addQuestion($quizID, $header, $ans1, $ans2, $ans3, $ans4, $corectAns);

Header("Location: CreateQuiz.php");
