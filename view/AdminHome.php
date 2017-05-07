<?php include './Header.php'; ?>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>
    <body>
        <div >
            <?php
            include '../controller/AdminOperations.php';
            if (isset($_SESSION['usertype']) == 'admin' && isset($_GET['deletequizid'])) {
                $quizId = $_GET['deletequizid'];
                AdminOperations::deleteQuiz($quizId);
            }
            
            $removeIcon = "<img src = '../recources/images/105.png' height = '32'>";
            $editIcon = "<img src = '../recources/images/Edit_User.png' height = '32'>";
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
                echo '<table class="containerr">
                         <thead>
                           <tr>
                              <th>Test Name</th>
                              <th>Test Code</th>
                              <th>Marker name</th>
                              <th>Secure</th>
                              <th>Delete</th>
                           </tr>
                    </thead><tbody>';
                while ($row = $result->fetch_assoc()) {
                    $id = $row['quiz_id'];
                    $name = $row['quiz_name'];
                    $password = $row['password'];
                    $maker = $row['username'];
                    if ($_SESSION['usertype'] != "doctor") {
                        echo '<tr>'
                        . '<td class="bt"><a href="Quiz.php?id=' . $id . '&&maker=' . $maker . '&&name=' . $name . '"> ' . $name . ' </a></td>'
                        . '<td>' . $id . '</td><td>' . $maker . '</td>';
                    } else {
                        echo '<tr>'
                        . '<td>' . $name . '</td>'
                        . '<td>' . $id . '</td><td>' . $maker . '</td>';
                    }
                    if (empty($password)) {
                        echo '<td><img src="../recources/images/1.png" height = "32" ></td>';
                    } else {
                        echo '<td><img src="../recources/images/0.png" height = "32" ></td>';
                    }
                    echo "<td class=''><a href = 'AdminHome.php?deletequizid=$id' onClick=\"javascript:return confirm('Are you Sure you Want to Delete this Quiz?');\"> $removeIcon</a></td>";
                    echo '</tr>';
                }
                echo '</tbody></table>';
            }
            ?>
        </div>
    </body>
</html