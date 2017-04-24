<?php

class LoginOperations {

    public static function loginChecker($user, $pass) {

        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);

        //Get all Quizzes for doctor that has doctor_name = 'dr.ahmed'

        $query = "SELECT `id` ,`username`, `type`, `image` FROM `users` WHERE "
                . "username = '" . $user . "' and password = '" . $pass . "'";

        $result = mysqli_query($conn, $query);

        if (mysqli_error($conn)) {
            echo 'LoginOPerations Error !!';
            return NULL;
        } else {
            return $result;
        }
    }

}

?>