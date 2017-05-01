<?php

class MyProfileOperations {

    public static function getMyData($user) {

        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);

        //Get all Quizzes for doctor that has doctor_name = 'dr.ahmed'

        $query = "SELECT id, username, email, type, birth_day,country, gender, phone, image, university, faculty "
                . "FROM `users` WHERE username = '$user'";

        $result = mysqli_query($conn, $query);

        if (mysqli_error($conn)) {
            echo 'MyProfileOPerations Error !!';

            return NULL;
        } else {
            return $result;
        }
    }
    public static function viewMyPhoto($user)
        {
            
        }

}

