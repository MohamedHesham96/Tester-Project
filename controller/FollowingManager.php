<?php

include '../controller/MyProfileOperations.php';

FollowingManager::followChecker();

class FollowingManager {

    public static function insertNewFollow($doctorId, $studentName) {

        include '../include/vars.php';
        $doctorName = $_GET['followname'];

        $conn = new mysqli($host, $username, $password, $dbname);

        //Get all Quizzes for doctor that has doctor_name = 'dr.ahmed'

        $query = "INSERT INTO `following`(`doctor_id`, `student_name`) VALUES ( '$doctorId', '$studentName' )";

        $result = mysqli_query($conn, $query);

        Header("location: ../view/profilepage.php?name=$doctorName&followstate=true");
    }

    public static function followChecker() {

        include '../include/vars.php';

        $doctorName = $_GET['followname'];

        $result = MyProfileOperations::getMyData($doctorName);
        $doctorId = "";
        if ($row = mysqli_fetch_assoc($result)) {

            $doctorId = $row['id'];
        }
        session_start();

        $studentName = $_SESSION['username'];

        $conn = new mysqli($host, $username, $password, $dbname);

        $query = "SELECT * FROM `following` WHERE doctor_id = '$doctorId' and student_name = '$studentName'";

        $result = mysqli_query($conn, $query);

        if (mysqli_error($conn)) {

            echo 'Following Manager  Error !!';
            
        } else if ($_GET['outprofile'] == "true") {

            $query = "SELECT * FROM `following` WHERE doctor_id = '$doctorId' and student_name = '$studentName'";

            $result = mysqli_query($conn, $query);

            if ($row = mysqli_fetch_assoc($result)) {
                Header("location: ../view/profilepage.php?name=$doctorName&followstate=true");
            } else {

                Header("location: ../view/profilepage.php?name=$doctorName&followstate=false");
            }
        } else if ($_GET['outprofile'] == "false") {

            if ($row = mysqli_fetch_array($result, 1)) {

                $query = "delete FROM `following` WHERE doctor_id = '$doctorId' and student_name = '$studentName'";

                $result = mysqli_query($conn, $query);

       Header("location: ../view/profilepage.php?name=$doctorName&followstate=false");
            } else {
                FollowingManager::insertNewFollow($doctorId, $studentName);
            }
        }
    }

}

?>