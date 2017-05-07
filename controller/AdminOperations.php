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

    public static function searchStudents($studentName) {

        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);

        //Get all Quizzes for doctor that has doctor_name = 'dr.ahmed'

        $query = "SELECT id, username, email, type, birth_day,country, gender, phone, image, university, faculty "
                . "FROM `users` where type = 'student' AND (username LIKE '%$studentName%' or id ='%$studentName%')";

        $result = mysqli_query($conn, $query);

        if (mysqli_error($conn)) {
            echo 'Admin Operations  (search student) Error !!';

            return NULL;
        } else {
            return $result;
        }
    }

    public static function searchDoctors($doctor) {

        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);

        //Get all Quizzes for doctor that has doctor_name = 'dr.ahmed'

        $query = "SELECT id, username, email,country, phone, image, university, faculty "
                . "FROM `users` where type = 'doctor' AND (username LIKE '%$doctor%' or id = '$doctor%')";

        $result = mysqli_query($conn, $query);

        if (mysqli_error($conn)) {
            echo 'Admin Operations  (search doctor) Error !!';

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

        $query1 = "delete FROM `quizzes` where quiz_id = '$Quizid'";
        $query2 = "delete FROM `questions` where quiz_id = '$Quizid'";
        $query3 = "delete FROM `history` where quiz_id = '$Quizid'";
        $query4 = "delete FROM `results` where quiz_id = '$Quizid'";
        $query5 = "delete FROM `submits` where quiz_id = '$Quizid'";

        $result = mysqli_query($conn, $query1);
        $result = mysqli_query($conn, $query2);
        $result = mysqli_query($conn, $query3);
        $result = mysqli_query($conn, $query4);
        $result = mysqli_query($conn, $query5);

        if (mysqli_error($conn)) {
            echo 'Admin Operations (DeleteUser) Error !!';

            return NULL;
        } else {
            return $result;
        }
    }

}

?>