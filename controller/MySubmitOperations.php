<?php

class MySubmitOperations {

    public static function submit($studentId, $quizId, $mark, $makerid) { // بعد كده نضيف الوقت 
        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);
        $user = $_SESSION['username'];

        // Submit Table
        $query = "INSERT INTO `submits` (`student_id`, `quiz_id`, `mark`) VALUES ( '$studentId', '$quizId', '$mark' )";

        // History Table
        $query2 = "INSERT INTO `history`(`quiz_id`, `submit_id`, `doctor_id`, `student_name`) "
                . "VALUES ('$quizId', (SELECT `id` FROM `submits` WHERE `quiz_id` = '$quizId' and `student_id` = '$studentId'), '$makerid', '$user')";

        $result = mysqli_query($conn, $query);
        $result2 = mysqli_query($conn, $query2);
    }

    public static function insertResult($studentName, $quizId, $studentAnswer, $header) { // بعد كده نضيف الوقت 
        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);

        // Results Table
        $query = "INSERT INTO `results` (`student_name`, `quiz_id`,`student_answer`, `question_header`) VALUES ( '$studentName', '$quizId', '$studentAnswer', '$header')";
        $result = mysqli_query($conn, $query);
    }

}

?>  