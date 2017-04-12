<?php

class MyQuizzesOperations {

    public static function getMyQuizzes() {

        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);

        //Get all Quizzes for doctor that has doctor_name = 'dr.ahmed'

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