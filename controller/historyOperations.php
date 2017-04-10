<?php


class historyOperations {

    public static function viewAllQuizzes() {

        $host = "localhost";
        $username = "root";
        $password = "31560";
        $dbname = "Testerdb";
        
        $conn = new mysqli($host, $username, $password, $dbname);
        $query = "SELECT quizzes.quiz_id, quizzes.quiz_name, users.username, submits.mark, submits.time, quizzes.password, quizzes.full_mark from history "
                . "JOIN quizzes on history.doctor_id = quizzes.doctor_id "
                // mohamed have to change here >> get the vale from the session
                . "JOIN submits on submit_id = submits.id and history.student_name = 'mohamed' "
                . "JOIN users on users.id = history.doctor_id GROUP BY quizzes.quiz_name";
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