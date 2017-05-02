<?php

class SubscribesOperations {

    public static function viewAllSubscribes($studentName) {

                       include '../include/vars.php';


        $conn = new mysqli($host, $username, $password, $dbname);

        $query = "SELECT  users.image, users.username, users.email FROM following JOIN users on "
                . "users.id = doctor_id WHERE student_name = '" . $studentName . "'";

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