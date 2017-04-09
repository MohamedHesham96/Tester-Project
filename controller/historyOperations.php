<?php

include 'DatabaseConnection.php';
include ('../include/vars.php');

class historyOperations {

    protected $dataBase;
    private $host = "localhost";
    private $username = "root";
    private $password = 31560;
    private $dbname = "Testerdb";

    public static function viewAllQuizzes() {

        $database = new Database;

        $conn = $database->connect();
        $query = "SELECT quizzes.quiz_id, quizzes.quiz_name, users.username, submits.mark, submits.time, quizzes.password from history JOIN quizzes on history.doctor_id = quizzes.doctor_id JOIN submits on submit_id = submits.id and student_name = 'mohamed' JOIN users GROUP BY quizzes.quiz_name";

        $conn->query($query);
    
        return mysqli_fetch_assoc($result);
    }
    
}

?>