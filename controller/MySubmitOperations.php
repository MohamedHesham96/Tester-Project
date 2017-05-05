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
           
           if($result2) {
               echo 'Correct';
           }
           if(!$result2) {
               echo 'Notttt Correct';
           }
        //    $result = mysqli_query($conn, $query);
    }

}

?>