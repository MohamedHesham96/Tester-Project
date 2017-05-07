<?php
class FollowersOperations {
    public static function getAllFollowers($userid) {
        
        include '../include/vars.php';
        $conn  = new mysqli($host, $username, $password, $dbname);
        $query = "SELECT * FROM users WHERE username IN (SELECT student_name FROM following WHERE doctor_id = '$userid')";
       
        $result = mysqli_query($conn, $query);
        if (mysqli_error($conn)) {
            echo 'Followers Error !!';
            return NULL;
        } else {
            return $result;
        }
    }
}
?>