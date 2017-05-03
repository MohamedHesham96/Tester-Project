<?php include './Header.php'; ?>
<html>
    <head>
    </head>
    
    <body >
    <h1> Your Exams  </h1>
        <div class="container">

            <table class="table-striped"> 
                <tr>	
                    <td>Question Header</td>
                    <td>Correct Answer</td>
                    <td>Your Answer</td>
                </tr>

                <?php
                include '../controller/viewMyResultOperations.php';
                $reult = ViewMyResultOperations::getMyResult($_SESSION['username'], $_GET['quizid']);

                if (!$reult) {
                    echo 'error2';
                } else {
                    while ($row = mysqli_fetch_array($reult, 1)) {

                        if ($row['correct_answer'] == $row['student_answer']) {
                            echo "<tr style='background: #00ff00'>";
                        } else {
                            echo "<tr style='background: #ff0033'>";
                        }

                        echo "<td>" . $row['question_Header'] . "</td>";
                        echo "<td>" . $row['correct_answer'] . "</td>";
                        echo "<td>" . $row['student_answer'] . "</td>";

                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </div>
        <link href="../recources/js/bootstrap.min.js" rel="stylesheet" type="text/javascript"/>
    </body>
</html>
