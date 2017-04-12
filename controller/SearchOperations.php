<?php

class SearchOperations {

    public static function getSearchResult() {

        include '../include/vars.php';


        $conn = new mysqli($host, $username, $password, $dbname);

        $sql = "SELECT quizzes.quiz_id, quizzes.quiz_name, users.username, quizzes.password from quizzes 
            JOIN users on users.id = quizzes.doctor_id where quiz_name LIKE '%test%' or quiz_id = 'test#2'";
        
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