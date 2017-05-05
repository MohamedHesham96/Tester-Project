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
            echo 'CreateQuizOperations Error !!';
            return NULL;
        } else {
            
        }
    }

    public static function getQuizID($doctorName) {

        include '../include/vars.php';
        $conn = new mysqli($host, $username, $password, $dbname);

        $user = $_SESSION['username'];

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
            echo 'CreateQuizOperations Error !!';
            return NULL;
        } else {
            
        }
    }

}

?>