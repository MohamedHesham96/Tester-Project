<?php
include './Header.php';
include '../controller/StudentHomeOperations.php';
?>
<html>
    <head>
        <meta charset="utf-8"/>

    </head>
    <body>
        <br>
        <br>
        <br>

        <?php
        //connect to data base and create table for result
        $studentName = $_SESSION['username'];
        $result = HomeStudnetOperations::getAllAvailableQuizzes($studentName);

        //display result in table
        echo '<div class="container">';
        echo '<table class="containerr">'
        . '<tr><th>Test Name</th>'
        . '<th>Test Code</th>'
        . '<th>Marker name</th>'
        . '<th>Secure</th>'
        . '</tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['quiz_id'];
            $name = $row['quiz_name'];
            $password = $row['password'];
            $maker = $row['username'];
            $makerId = $row['id'];
            $fullMark = $row['full_mark'];

            if ($_SESSION['usertype'] != "doctor") {

                echo '<tr>'
                . '<td><a href="Quiz.php?id=' . $id . '&&maker=' . $maker . '&&name=' . $name . '&&fullmark=' . $fullMark . '&&makerid=' . $makerId . '">' . $name . '</a></td>'
                . '<td>' . $id . '</td><td>' . $maker . '</td>';
            } else {

                echo '<tr>'
                . '<td>' . $name . '</td>'
                . '<td>' . $id . '</td><td>' . $maker . '</td>';
            }

            if (empty($password)) {
                echo '<td><img src="../recources/images/unlock.png" style="max-width:20px; max-hight:20px;"></td>';
            } else {
                echo '<td><img src="../recources/images/lock.png " style="max-width:20px;max-hight:20px;"></td>';
            }
            echo '</tr>';
        }

        echo '</table>';
        echo '</div>';
        ?>
    </body>
</html>