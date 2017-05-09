<?php

include '../include/vars.php';
$conn = new mysqli($host, $username, $password, $dbname);

//Update Quize state 

if (isset($_GET['state'])) {
    $state = $_GET['state'];
    $id = $_GET['id'];
    $newState = "";

    if ($state == "Expired") {
        $newState = "opened";
    } else {
        $newState = "Expired";
    }

    $query = "UPDATE `quizzes` SET `state` = '$newState' WHERE `quizzes`.`quiz_id` = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_error($conn)) {
        die('Update Quiz Error !!');
    } else {
        header("Location: MyQuizzes.php");
    }
}