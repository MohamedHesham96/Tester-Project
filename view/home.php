<html>
    <head>
        <meta charset="utf-8"/>

    </head>
    <body>

        <?php
        include './header.php';
        ?>


        <br>
        <br>
        <br>

        <?php
        //connect to data base and create table for result
        include '../include/vars.php';

        $conn = mysqli_connect($host, $username, $password, $dbname);
        if ($conn->error)
            die("connection lost");

        $sql = "SELECT quizzes.quiz_id, quizzes.quiz_name, users.username, quizzes.password from quizzes JOIN users on users.id = quizzes.doctor_id";
        $result = $conn->query($sql);

        //display result in table
        echo '<div class="container">';
        
        echo '<table class="table-striped">'
        . '<tr><th>Test Name</th>'
        . '<th>Test Code</th>'
        . '<th>Marker name</th>'
        . '<th>Secure</th>'
        . '</tr>';

        while ($row = $result->fetch_assoc()) {
            $id = $row['quiz_id'];
            $name = $row['quiz_name'];
            $password = $row['password'];
            $maker = $row['username'];

            if ($_SESSION['usertype'] != "doctor") {

                echo '<tr>'
                . '<td><a href="Quiz.php?id=' . $id . '&&maker=' . $maker . '&&name=' . $name . '">' . $name . '</a></td>'
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