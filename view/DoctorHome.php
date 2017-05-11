<?php include './Header.php'; ?>
<html>
    <head>

        <meta charset="utf-8"/>
        <link href="../recources/css/style1.css" rel="stylesheet" />

        <style type="text/css">
            body{
                background: url("../recources/images/back2.jpg") no-repeat  top;
                width: 100%;
                height: 100%;

            }

        </style>
    </head>
    <body>


        <div style="background-color: rgba(0, 0, 0, 0.37); height:100%;width: 100%; margin-top: -20px ">
            <br><br>
            <?php
            //connect to data base and create table for result
            include '../include/vars.php';
            $conn = mysqli_connect($host, $username, $password, $dbname);
            if ($conn->error)
                die("connection lost");
            $sql = "SELECT quizzes.quiz_id, quizzes.quiz_name, users.username, quizzes.password from quizzes JOIN users on users.id = quizzes.doctor_id where quizzes.state = 'opened'";
            $result = $conn->query($sql);
            if (!$result)
                die($conn->error);
            //display result in table
            if ($result->num_rows > 0) {
                echo '<div class="container">';
                echo '<table class="containerr table"><thead>'
                . '<tr><th>Quiz Code</th>'
                . '<th>Quiz Name</th>'
                . '<th>Doctor name</th>'
                . '<th>Secure</th>'
                . '</tr><thead><tbody>';
                while ($row = $result->fetch_assoc()) {
                    $id = $row['quiz_id'];
                    $name = $row['quiz_name'];
                    $password = $row['password'];
                    $maker = $row['username'];

                    if ($_SESSION['usertype'] == "student") {

                        echo '<tr>'
                        . '<td><a href="Quiz.php?id=' . $id . '&&maker=' . $maker . '&&name=' . $name . '">' . $name . '</a></td>'
                        . '<td>' . $id . '</td><td>' . $maker . '</td>';
                    } else {

                        echo '<tr>'
                        . '<td>' . $name . '</td>'
                        . '<td>' . $id . '</td><td>' . $maker . '</td>';
                    }
                    if (empty($password)) {
                        echo '<td><img src="../recources/images/1.png" style="max-width:25px; "></td>';
                    } else {
                        echo '<td><img src="../recources/images/0.png " style="max-width:25px;"></td>';
                    }
                    echo '</tr>';
                }
                echo '</tbody></table></div>';
            }
            ?>
        </div>
        <?php include './footer.php';
        ?>
    </body>
</html>
