<html>
    <head>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <meta charset="utf-8"/>

    </head>
    <body>

        <?php include './header.php'; ?>
        <?php
        //print the foo value
        //    echo ($_POST['foo'] ? $_POST['foo'] : 'none');
        ?>

        <br>
        <br>
        <br>

        <div class="container">
            <?php
            include '../controller/AdminOperations.php';
            if (isset($_SESSION['usertype']) && isset($_GET['deletequizid'])) {
                $quizId = $_GET['deletequizid'];
                //    AdminOperations::deleteQuiz($quizId);
            }




            $removeIcon = "<img src = '../recources/images/remove_user.png' height = '32'>";
            $editIcon = "<img src = '../recources/images/edit_user.png' height = '32'>";

            //connect to data base and create table for result
            include '../include/vars.php';
            $conn = mysqli_connect($host, $username, $password, $dbname);
            if ($conn->error)
                die("connection lost");
            $sql = "SELECT quizzes.quiz_id, quizzes.quiz_name, users.username, quizzes.password from quizzes JOIN users on users.id = quizzes.doctor_id";
            $result = $conn->query($sql);
            if (!$result)
                die($conn->error);
            //display result in table
            if ($result->num_rows > 0) {
                echo '<table class="table-striped"><thead><tr><th>Test Name<th>Test Code</th><th>Marker name</th><th>Secure</th></tr><thead><tbody>';
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
                    echo "<td><a onClick=\"\"> $removeIcon  </a></td>";

                    echo '</tr>';
                }
                echo '</tbody></table>';
            }
            ?>
        </div>

    
    </body>


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</html>