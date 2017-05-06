<?php

class CreateQuizOperations {

    public static function addQuiz() {

        include '../include/vars.php';
        $conn = new mysqli($host, $username, $password, $dbname);

        $user = $_SESSION['username'];

        // قيمة معينة في الداتا بايز علشان تعرف بعد كده تضيف الاسئلة فين

        $query = "INSERT INTO `quizzes` (`state`) VALUES ('$user')";

        $result = mysqli_query($conn, $query);

        if (mysqli_error($conn)) {
            echo 'CreateQuizOperations (ADD Quiz) Error !!';
            return NULL;
        } else {
            
        }
    }

    public static function getQuizID($doctorName) {

        include '../include/vars.php';
        $conn = new mysqli($host, $username, $password, $dbname);

        // قيمة معينة في الداتا بايز علشان تعرف بعد كده تضيف الاسئلة فين

        $query = "SELECT `quiz_id` FROM `quizzes` WHERE `state` = '$doctorName'";

        $result = mysqli_query($conn, $query);


        if ($row = mysqli_fetch_assoc($result)) {

            return $row['quiz_id'];
        } else {
            echo 'CreateQuizOperations (GET QUIZ ID) Error !!';
            return NULL;
        }
    }

    public static function addQuestion($quizID, $header, $ans1, $ans2, $ans3, $ans4, $corectAns) {

        include '../include/vars.php';
        $conn = new mysqli($host, $username, $password, $dbname);

        $user = $_SESSION['username'];

        // قيمة معينة في الداتا بايز علشان تعرف بعد كده تضيف الاسئلة فين

        $query = "INSERT INTO `questions`(`quiz_id`, `header`, "
                . "`answer_1`, `answer_2`, `answer_3`, `answer_4`, `correct_answer`) VALUES ('$quizID','$header','$ans1','$ans2','$ans3','$ans4','$corectAns')";

        $result = mysqli_query($conn, $query);

        if (mysqli_error($conn)) {
            echo 'CreateQuizOperations (ADD QUESTION) Error !!';
            return NULL;
        } else {
            
        }
    }

    public static function getQuestions($quizId) {

        include '../include/vars.php';
        $conn = new mysqli($host, $username, $password, $dbname);

        // قيمة معينة في الداتا بايز علشان تعرف بعد كده تضيف الاسئلة فين

        $query = "SELECT `header`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `correct_answer` FROM questions WHERE `quiz_id`= '$quizId'";

        $result = mysqli_query($conn, $query);

        if (mysqli_error($conn)) {
            echo 'CreateQuizOperations (GET QUESTION) Error !!';
            return NULL;
        } else {
            return $result;
        }
    }

    public static function deleteQuiz($quizId) {

        include '../include/vars.php';
        $conn = new mysqli($host, $username, $password, $dbname);

        // قيمة معينة في الداتا بايز علشان تعرف بعد كده تضيف الاسئلة فين

        $query = "DELETE FROM questions WHERE `quiz_id`= '$quizId'";
        $query2 = "DELETE FROM quizzes WHERE `quiz_id`= '$quizId'";

        $result = mysqli_query($conn, $query);
        $result2 = mysqli_query($conn, $query2);

        if (mysqli_error($conn)) {
            echo 'CreateQuizOperations (DELETE QUIZ) Error !!';
            return NULL;
        } else {
            return $result;
        }
    }

}

?>