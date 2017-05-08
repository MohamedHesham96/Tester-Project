<?php include './Header.php'; ?>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="../recources/css/style.css" rel="stylesheet" /> 
        <style type="text/css">
            .remove {
                font-size:1em; 
                font-weight: bold;
                font-size: 25;
                display: block;
                padding: 0;
                margin:0;
                color: #000;
              }
              .remove:hover{
                  color: red;
              }
              .atest {
                display: block;
                padding-bottom: 0;
                margin:0; 
                color: #000;
              }


        </style>
    </head>
    <body>
        <div class="container">
            <?php
            include '../controller/AdminOperations.php';
            if (isset($_SESSION['usertype']) == 'admin' && isset($_GET['deletequizid'])) {
                $quizId = $_GET['deletequizid'];
                AdminOperations::deleteQuiz($quizId);
            }
            
            $removeIcon = '<span class="remove glyphicon glyphicon-remove" aria-hidden="true"></span>';            //connect to data base and create table for result
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
                echo '<table class="containerr table">
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
                    echo "<td class='bt'><a href = 'AdminHome.php?deletequizid=$id' onClick=\"javascript:return confirm('Are you Sure you Want to Delete this Quiz?');\"> $removeIcon</a></td>";
                    echo '</tr>';
                }
                echo '</tbody></table>';
            }
            ?>
        </div>
    </body>
</html