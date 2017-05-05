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
            echo 'Admin Operations (Get All Doctors ) Error !!';

            return NULL;
        } else {
            return $result;
        }
    }

    public static function getAllStudents() {

        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);

        //Get all Quizzes for doctor that has doctor_name = 'dr.ahmed'

        $query = "SELECT id, username, email, type, birth_day,country, gender, phone, image, university, faculty "
                . "FROM `users` where type = 'student'";

        $result = mysqli_query($conn, $query);

        if (mysqli_error($conn)) {
            echo 'Admin Operations  (Get All Student) Error !!';

            return NULL;
        } else {
            return $result;
        }
    }
    
    
    
        public static function deleteUser($user) {

        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);

        //Get all Quizzes for doctor that has doctor_name = 'dr.ahmed'

        $query = "delete FROM `users` where username = '$user'";

        $result = mysqli_query($conn, $query);

        if (mysqli_error($conn)) {
            echo 'Admin Operations (DeleteUser) Error !!';

            return NULL;
        } else {
            return $result;
        }
    }
    
    
    
    
        public static function deleteQuiz($Quizid) {

        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);

        //Get all Quizzes for doctor that has doctor_name = 'dr.ahmed'

        $query = "delete FROM `quizzes` where quiz_id = '$Quizid'";

        $result = mysqli_query($conn, $query);

        if (mysqli_error($conn)) {
            echo 'Admin Operations (DeleteUser) Error !!';

            return NULL;
        } else {
            return $result;
        }
    }


}

?>