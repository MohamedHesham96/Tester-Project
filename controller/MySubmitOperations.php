<?php

include '../controller/MyProfileOperations.php';

FollowingManager::followChecker();

class MySubmitOperations {

    public static function insertNewFollow($doctorId, $studentName) {

        include '../include/vars.php';
        $doctorName = $_GET['followname'];

        $conn = new mysqli($host, $username, $password, $dbname);

        //Get all Quizzes for doctor that has doctor_name = 'dr.ahmed'

        $query = "INSERT INTO `following`(`doctor_id`, `student_name`) VALUES ( '$doctorId', '$studentName' )";

        $result = mysqli_query($conn, $query);

        Header("location: ../view/ProfilePage.php?name=$doctorName&followstate=true");
    }

}

?>