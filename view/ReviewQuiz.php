<?php
include '../controller/CreateQuizOperations.php';
include './Header.php';
?>
<html>
    <head><link href = "../recources/css/style.css" rel = "stylesheet" />
    </head>
    <body>

        <style type="text/css">
            body{
                background: url("../recources/images/background.jpg") no-repeat right top;
                width: 100%;
                height: 100%
            }
        </style>
        <table class="containerr"> 
            <tr>	

                <th>Question</th>
                <th>Answer (A)</th>
                <th>Answer (B)</th>
                <th>Answer (C)</th>
                <th>Answer (D)</th>
                <th style="background: #05AE0E">Correct Answer</th>
            </tr>



            <?php
            $name = $_GET['name'];
            $quizId = $_GET['id'];
            $pass = $_GET['pass'];
            $fullMark = $_GET['fullmark'];



            $result = CreateQuizOperations::getQuestions($quizId);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['header'] . "</td>";
                echo "<td>" . $row['answer_1'] . "</td>";
                echo "<td>" . $row['answer_2'] . "</td>";
                echo "<td>" . $row['answer_3'] . "</td>";
                echo "<td>" . $row['answer_4'] . "</td>";
                echo "<td>" . $row['correct_answer'] . "</td>";
                echo '</tr>';
            }
            ?>
        </table>

    </body

</html>