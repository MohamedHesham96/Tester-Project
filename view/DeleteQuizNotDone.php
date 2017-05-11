<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>delete quiz</title>
  </head>
  <body>
    <?php

    include '../controller/CreateQuizOperations.php';

    session_start();
    $user = $_SESSION['username'];
    $quizID = CreateQuizOperations::getQuizID($user);
    CreateQuizOperations::deleteQuiz($quizID);

    echo '<script>document.location.href="DoctorHome.php?"</script>';?>
    <?php include './footer.php';
    ?>
  </body>
</html>
<?php
