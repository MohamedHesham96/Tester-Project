<?php

class HomeStudnetOperations {

    public static function getAllAvailableQuizzes($studentName) {
        include '../include/vars.php';
        $conn = new mysqli($host, $username, $password, $dbname);

        //here search by code and name 
            $query = "SELECT quizzes.quiz_id, quizzes.quiz_name, users.username,"
                    . " quizzes.password, quizzes.full_mark, users.id from quizzes JOIN users on users.id = quizzes.doctor_id "
                    . "WHERE quizzes.quiz_id Not IN (SELECT history.quiz_id FROM history WHERE history.student_name = '$studentName')";

        $result = mysqli_query($conn, $query);
        
        if (mysqli_error($conn)) {
            echo 'Home Studnet Operations Error !!';
            return NULL;
        } else {
            return $result;
        }
    }

}

?>