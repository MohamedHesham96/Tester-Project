<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>finish quiz</title>
  </head>
  <body>
    <?php

    include '../controller/CreateQuizOperations.php';

    session_start();

    $quizID = CreateQuizOperations::getQuizID($_SESSION['username']);

    if (!$quizID) {
        CreateQuizOperations::addQuiz();
        $quizID = CreateQuizOperations::getQuizID($_SESSION['username']);
    }

    $header = $_GET['question'];
    $ans1 = $_GET['ans1'];
    $ans2 = $_GET['ans2'];
    $ans3 = '';
    $ans4 = '';

    if (isset($_GET['ans3'])) {
        $ans3 = $_GET['ans3'];
    }

    if (isset($_GET['ans4'])) {
        $ans4 = $_GET['ans4'];
    }

    $corectAns = $_GET['correctans'];

    $quizID = CreateQuizOperations::addQuestion($quizID, $header, $ans1, $ans2, $ans3, $ans4, $corectAns);

    echo '<script>document.location.href="CreateQuiz.php?submitstate=true"</script>';?>
    <?php include './footer.php';
    ?>

  </body>
</html>
