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
                    <th >Password</th>
                </tr>

                <?php
                include '../controller/HistoryOperations.php';
                $result = HistoryOperations::viewAllQuizzes($studentName);

// check if the statment is true

                if (!$result) {
                    echo 'error2';
                } else {
                    $trID = 0;
                    while ($row = mysqli_fetch_array($result, 1)) {
                        $trID++;

                        $quizId = $row["quiz_id"];
                        $quizname = $row['quiz_name'];
                        $quizMaker = $row['username'];
                        $mark = $row['mark'];
                        $fullmakr = $row['full_mark'];

                        echo "<tr style='cursor: pointer' id='$trID'>";
                        echo "<td>" . $row["quiz_id"] . "</a></td>";
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
                        ?>

                        <script>
                            var quiz_id = <?php echo json_encode($row['quiz_id']); ?>;
                            var quizName = <?php echo json_encode($row['quiz_name']) ?>;
                            var quizMaker = <?php echo json_encode($row['username']) ?>;
                            var fullMark = <?php echo json_encode($row['full_mark']) ?>;

                            var id = <?php echo json_encode($trID) ?>;

                            var link = "ViewMyResult.php?quizid=" + quiz_id + "&maker=" + quizMaker + "&name=" + quizName + "&fullmark=" + fullMark;
                            
                            $("#" + id).attr('href', link);

                            $("#" + id).on("click", function () {
                                document.location = $(this).attr('href');
                            });
                        </script>


                        <?php
                    }
                }
                ?>
            </table>

        </div>
    </body>
</html>
