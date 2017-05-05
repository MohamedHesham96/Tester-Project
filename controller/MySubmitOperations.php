<?php


class MySubmitOperations {

    public static function submit($studentId, $quizId, $mark) { // بعد كده نضيف الوقت 

        include '../include/vars.php';

        $conn = new mysqli($host, $username, $password, $dbname);

        $query = "INSERT INTO `submits` (`student_id`, `quiz_id`, `mark`) VALUES ( '$studentId', '$quizId', '$mark' )";

        $result = mysqli_query($conn, $query);

    }

}

?>