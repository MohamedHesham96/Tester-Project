<?php

class HistoryOperations {

    public static function viewAllQuizzes() {

        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "testerdb";
        // mohamed have to change here >> get the vale from the session
        $conn = new mysqli($host, $username, $password, $dbname);
        $query = "SELECT quizzes.quiz_id, quizzes.quiz_name, users.username, submits.mark, submits.time, quizzes.password, quizzes.full_mark from history "
                . "JOIN quizzes on history.doctor_id = quizzes.doctor_id and quizzes.quiz_id = history.quiz_id "
                . "JOIN submits on submit_id = submits.id and history.student_name = 'mohamed' "
                . "JOIN users on users.id = history.doctor_id GROUP by quizzes.quiz_id";
        $result = mysqli_query($conn, $query);

        if (mysqli_error($conn)) {
            echo 'error ';

            return NULL;
        } else {
            return $result;
        }
    }

}

?>