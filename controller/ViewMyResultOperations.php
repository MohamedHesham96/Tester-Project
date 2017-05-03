<?php

class ViewMyResultOperations {

    public static function getMyResult($studentName, $quizId) {

        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);

        //Get all Quizzes for doctor that has doctor_name = 'dr.ahmed'
        
        $query = "SELECT results.question_Header, questions.correct_answer, results.student_answer FROM results "
                . "JOIN questions on questions.Header = results.question_Header WHERE results.student_name = '$studentName'"
                . "and questions.quiz_id = $quizId";

        $result = mysqli_query($conn, $query);

        if (mysqli_error($conn)) {
            echo 'Error !!';

            return NULL;
        } else {
            return $result;
        }
    }

}

?>