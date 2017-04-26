<?php

class AdminOperations {

    public static function getAllDoctors() {

        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);

        //Get all Quizzes for doctor that has doctor_name = 'dr.ahmed'

        $query = "SELECT id, username, email, type, birth_day,country, gender, phone, image, university, faculty "
                . "FROM `users` where type = 'doctor'";

        $result = mysqli_query($conn, $query);

        if (mysqli_error($conn)) {
            echo 'Admin Operations Error !!';

            return NULL;
        } else {
            return $result;
        }
    }

}

?>