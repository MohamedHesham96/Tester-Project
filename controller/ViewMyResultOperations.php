<?php

class ViewMyResultOperations {

    public static function getMyResult() {

        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);

        //Get all Quizzes for doctor that has doctor_name = 'dr.ahmed'
        
        $query = "SELECT results.question_header, questions.correct_answer, results.student_anwser FROM results "
                . "JOIN questions on questions.header = results.question_header WHERE results.student_name = 'mohamed'";

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