<?php

include '../controller/MyProfileOperations.php';

$doctorName = $_GET['followname'];

$result = MyProfileOperations::getMyData($doctorName);
$doctorId = "";
if ($row = mysqli_fetch_assoc($result)) {

    $doctorId = $row['id'];
}
session_start();

$studentName = $_SESSION['username'];

FollowingManager::insertNewFollow($doctorId, $studentName);

class FollowingManager {

    public static function insertNewFollow($doctorId, $studentName) {

        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);

        //Get all Quizzes for doctor that has doctor_name = 'dr.ahmed'

        $query = "INSERT INTO `following`(`doctor_id`, `student_name`) VALUES ( '$doctorId', '$studentName' )";

        $result = mysqli_query($conn, $query);

        if (mysqli_error($conn)) {
            echo 'FollowingManger Error !!';

            return NULL;
        } else {
            return $result;
        }
    }

}

?>