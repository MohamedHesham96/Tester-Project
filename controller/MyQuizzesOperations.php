<?php

class MyQuizzesOperations {

    public static function getMyQuizzes($doctorName) {

        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);

        //Get all Quizzes for doctor that has doctor_name = 'dr.ahmed'
        
        $query = "SELECT quiz_id, quiz_name, full_mark, date, password from quizzes "
                . "where doctor_name = '"  . $doctorName. "'";

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