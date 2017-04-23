<?php

class FollowersOperations {

    public static function viewAllQuizzes() {

        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);
        $query = "SELECT student_name FROM following WHERE doctor_id = 1";
        
        $result = mysqli_query($conn, $query);

        if (mysqli_error($conn)) {
            echo 'Followers Error !!';

            return NULL;
        } else {
            return $result;
        }
    }

}

?>
