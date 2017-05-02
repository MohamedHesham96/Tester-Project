<?php

class SearchOperations {

    public static function getSearchResult($search) {

        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);
        
        //here search by code and name 
        $query = "SELECT quizzes.quiz_id, quizzes.quiz_name, users.username, quizzes.password from quizzes "
                      . "JOIN users on users.id = quizzes.doctor_id where quiz_name LIKE '%".$search."%' or quiz_id = '".$search."'";
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