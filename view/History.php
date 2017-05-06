<?php include './Header.php'; ?>
<html>
    <head>
        
    </head>
    <body >


        <?php
    
        if (isset($_GET['name'])) {
            $studentName = $_GET['name'];
        } else {
            $studentName = $_SESSION['username'];
        }
        ?>
        <h1> Your Exams </h1>

        <div class="">

            <table class="containerr"> 
                <tr>	
                    <th>Quiz code</th>
                    <th>Quiz Name</th>
                    <th>Doctor name</th>
                    <th>Mark</th>
                    <th>Time</th>
                    <th>Password</th>
                </tr>


                <?php
                include '../controller/HistoryOperations.php';
                $result = HistoryOperations::viewAllQuizzes($studentName);

// check if the statment is true

                if (!$result) {
                    echo 'error2';
                } else {
                    while ($row = mysqli_fetch_array($result, 1)) {
                        $quizId = $row["quiz_id"];
                        $quizname = $row['quiz_name'];
                        $quizMaker = $row['username'];
                        $mark = $row['mark'];
                        $fullmakr = $row['full_mark'];

                        echo "<tr>";
                        echo "<td><a href = 'viewmyresult.php?quizid=$quizId&maker=$quizMaker&name=$quizname&mark=$mark&fulmark=$fullmakr'>" . $row["quiz_id"] . "</a></td>";
                        echo "<td>" . $row['quiz_name'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['mark'] . " / " . $row['full_mark'] . "</td>";
                        echo "<td>" . $row['time'] . "</td>";

                        if ($row['password']) {
                            echo "<td>" . '<img src=" ../recources/images/0.png"  height="27">' . " </td>";
                        } else {
                            echo "<td>" . '<img src=" ../recources/images/1.png"  height="27">' . " </td>";
                        }
                        echo "</tr>";
                    }
                }
                ?>
            </table>

        </div>
        <link href="../recources/js/bootstrap.min.js" rel="stylesheet" type="text/javascript"/>
    </body>
</html>
