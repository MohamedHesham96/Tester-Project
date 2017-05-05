<?php
include './Header.php';
include '../controller/MySubmitOperations.php';
?>
<html>
    <head>
        <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/style1.css" rel="stylesheet" type="text/css"/>
        <meta charset="utf-8"/>
    </head>
    <body >
        <?php
        $name = $_GET['quizname'];
        $quizId = $_GET['quizid'];
        $maker = $_GET['quizdoctor'];
        $fullMark = $_GET['quizfullmark'];
        $makerid = $_GET['makerid'];



        echo ' <div class="" id=" Quiz-details" style="text-align: center"> <br><br>';

        echo "Quiz id    : $quizId <br><br>"; // display quiz id
        echo "Quiz name  : $name <br><br>"; // display quiz name
        echo "Full Mark  : $fullMark <br><br>"; // display quiz name
        echo "Quiz maker : <a href='../controller/FollowingManager.php?outprofile=true&followname=$maker'>$maker</a><br><br>"; //may be go to doctor profile
        echo ' </div>';
        ?>  

        <h1> Your Result </h1>
        <div class="container">

            <table class="table-striped"> 
                <tr>	
                    <td>Question Header</td>
                    <td>Correct Answer</td>
                    <td>Your Answer</td>
                </tr>

                <?php
                $count = 0; // count the number of questions
                $successCount = 0; // count the number of corect answers 

                for ($i = 0; $i <= 50; $i++) { // بيمشي على الاسماء الي جاية من اللينك لحد رقم كبير علشان يضمن انه هيمشي على كله 
                    if (isset($_GET['correct_ans' . $i]) && isset($_GET[$i])) {

                        $count++;

                        if ($_GET['correct_ans' . $i] == $_GET[$i]) {
                            $successCount++;
                            echo "<tr style='background: #00ff00'>";
                        } else if (($_GET['correct_ans' . $i] != $_GET[$i])) {

                            echo "<tr style='background: #ff0033'>";
                        }

                        echo "<td>" . "Header" . "</td>";
                        echo "<td>" . $_GET['correct_ans' . $i] . "</td>";
                        echo "<td>" . $_GET[$i] . "</td>";

                        echo "</tr>";
                    }
                }
                
                $result = $successCount * $fullMark / $count;
                echo $result;

                MySubmitOperations::submit($_SESSION['userid'], $quizId, $result, $makerid);
                ?>
            </table>
        </div>
        <link href="../recources/js/bootstrap.min.js" rel="stylesheet" type="text/javascript"/>
    </body>
</html>
