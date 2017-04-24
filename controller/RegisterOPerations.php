<?php

class RegisterOperations {

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

    public static function signUp($user, $pass, $email, $type, $birthDay, $country, $phone, $univers, $faculty) {

        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);

        //Get all Quizzes for doctor that has doctor_name = 'dr.ahmed'
        $query = "INSERT INTO `users`(`username`, `password`, `email`, `type`, `birth_day`, "
                . "`country`, `phone`, `university`, `faculty`) "
                . "VALUES ('$user', '$pass', '$email', '$type', '$birthDay', '$country', '$phone', '$univers', '$faculty')";

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