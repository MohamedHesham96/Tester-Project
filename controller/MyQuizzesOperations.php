<?php

class MyQuizzesOperations {

    public static function getMyQuizzes($doctorName) {

        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);

        //Get all Quizzes for doctor that has doctor_name = 'dr.ahmed'

        $query = "SELECT quiz_id, quiz_name, full_mark, date, `time`, password ,state from quizzes "
                . "where doctor_name = '" . $doctorName . "'";

        $result = mysqli_query($conn, $query);

        if (mysqli_error($conn)) {
            echo 'My Quizzes OperationsError !!';

            return NULL;
        } else {
            return $result;
        }
    }

    public static function getMyQuizzesCount($doctorName) {
        $result = MyQuizzesOperations::getMyQuizzes($doctorName);
        $num = mysqli_num_rows($result);
        return $num;
    }

    public static function getQuizQuestionsByID($id) {



        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);

        //Get all Quizzes for doctor that has doctor_name = 'dr.ahmed'

        $query = "SELECT `question_id`, `Header`, `correct_answer` FROM `questions` JOIN quizzes on quizzes.quiz_id = questions.quiz_id WHERE questions.quiz_id = '$id'";


        $result = mysqli_query($conn, $query);

        if (mysqli_error($conn)) {
            echo 'My Quizzes OperationsError !!';

            return NULL;
        } else {
            return $result;
        }
    }

    public static function getAnsOnly($Header) {



        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);

        //Get all Quizzes for doctor that has doctor_name = 'dr.ahmed'

        $query = "SELECT `answer_1`, `answer_2`, `answer_3`, `answer_4` FROM `questions`"
                . "JOIN quizzes on quizzes.quiz_id = questions.quiz_id WHERE questions.Header = '$Header'";


        $result = mysqli_query($conn, $query);

        if (mysqli_error($conn)) {
            echo 'My Quizzes OperationsError !!';

            return NULL;
        } else {
            return $result;
        }
    }

    public static function getHeaderOnly($Header) {

        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);

        //Get all Quizzes for doctor that has doctor_name = 'dr.ahmed'

        $query = "SELECT `Header` FROM `questions`"
                . "JOIN quizzes on quizzes.quiz_id = questions.quiz_id ";

        $result = mysqli_query($conn, $query);

        if (mysqli_error($conn)) {
            echo 'My Quizzes OperationsError !!';

            return NULL;
        } else {
            return $result;
        }
    }
    public static function getQuizById($quizId){
        include '../include/vars.php';
        $conn = new mysqli($host, $username, $password, $dbname);
        
        $query="SELECT * FROM quizzes WHERE quiz_id =$quizId";
        
        $result = mysqli_query($conn, $query);
        if (mysqli_error($conn)) {
            echo mysqli_error($conn);
            return NULL;
        } else {
            return $result;
        }
    }

}

?>