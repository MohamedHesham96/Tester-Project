<html>
    <head>
        
    </head>
    <body >


        <?php
        session_start();

        if (isset($_GET['name'])) {
            $studentName = $_GET['name'];
        } else {
            $studentName = $_SESSION['username'];
        }
        ?>

        <?php include './header.php'; ?>

        <h1> Your Exams </h1>

        <div class="container">

            <table class="table-striped"> 
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
                            echo "<td>" . '<img src=" ../recources/images/lock.png"  height="20" width="20">' . " </td>";
                        } else {
                            echo "<td>" . '<img src=" ../recources/images/unlock.png"  height="22" width="22">' . " </td>";
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
