<?php include './Header.php'; ?>
<html>
    <head>
          <link href="../recources/css/style1.css" rel="stylesheet" /> 
          <style>
             body{
                background: url("../recources/images/1.jpg") no-repeat right top;
                width: 100%;
                height: 100%;
                    
            }
         </style>

    </head>
    
    <body >
        <h1><center> Your Exams  </center></h1>
        <div class="container">

            <table class="containerr table"> 
                <thead>
                    <tr>	
                        <th>Question Header</th>
                        <th>Correct Answer</th>
                        <th>Your Answer</th>
                    </tr>
                </thead>
                <?php
                include '../controller/ViewMyResultOperations.php';
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
