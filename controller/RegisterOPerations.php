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

    public static function usernameChecker($user) {   // chekc if the sign up username is repeated of not
        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);

        //Get all Quizzes for doctor that has doctor_name = 'dr.ahmed'

        $query = "SELECT `id` ,`username`, `type`, `image` FROM `users` WHERE "
                . "username = '" . $user . "'";


        $result = mysqli_query($conn, $query);

        if (mysqli_error($conn)) {
            echo 'Username Checker Error !!';
            return NULL;
        } else {
            return $result;
        }
    }

    
    public static function emailChecker($email) {   // chekc if the sign up email is repeated of not
        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);

        //Get all Quizzes for doctor that has doctor_name = 'dr.ahmed'

        $query = "SELECT `id` ,`username`, `type`, `image` FROM `users` WHERE "
                . "email = '" . $email . "'";

        $result = mysqli_query($conn, $query);

        if (mysqli_error($conn)) {
            echo 'Username Checker Error !!';
            return NULL;
        } else {
            return $result;
        }
    }
    
    
    public static function signUp($user, $pass, $email, $type, $birthDay, $country, $phone, $univers, $faculty, $gender) {

        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);

        //Get all Quizzes for doctor that has doctor_name = 'dr.ahmed'
        $query = "INSERT INTO `users`(`username`, `password`, `email`, `type`, `birth_day`, "
                . "`country`, `phone`, `university`, `faculty`, `gender`) "
                . "VALUES ('$user', '$pass', '$email', '$type', '$birthDay', '$country', '$phone', '$univers', '$faculty', '$gender')";

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