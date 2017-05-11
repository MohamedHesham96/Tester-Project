<?php
include './Header.php';
include '../controller/MySubmitOperations.php';
?>
<html>
    <head>
        <link href="../recources/css/style1.css" rel="stylesheet" /> 
                 <style type="text/css">
            body{
                background: url("../recources/images/back2.jpg") no-repeat  top;
                width: 100%;
                height: 100%;
                    
            }
            th a{
                display: block;
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 0;
                font-size: 20;
                color: #F5F5F5; 

            }

        </style>

    </head>
    <body >


        <?php
      
        $name = $_GET['quizname'];
        $quizId = $_GET['quizid'];
        $maker = $_GET['quizdoctor'];
        $fullMark = $_GET['quizfullmark'];
        $makerid = $_GET['makerid'];



        echo ' <div class="" id=" Quiz-details" style="text-align: center"> <br><br>';

        echo "<h3>Quiz id    : $quizId </h3>"; // display quiz id
        echo "<h3>Quiz name  : $name </h3>"; // display quiz name
        echo "<h3>Full Mark  : $fullMark </h3>"; // display quiz name
        echo "<h3>Quiz maker : <a href='../controller/FollowingManager.php?outprofile=true&followname=$maker'>$maker</a></h3>"; //may be go to doctor profile
        echo ' </div>';
        ?>  

        
        <div class="container">

            <table class="containerr table"> 
                <tr>	
                    <th>Question Header</th>
                    <th>Correct Answer</th>
                    <th>Your Answer</th>
                </tr>

                <?php
                $count = 0; // count the number of questions
                $successCount = 0; // count the number of corect answers 
                $user = $_SESSION['username'];

                for ($i = 0; $i <= 1000000; $i++) { // بيمشي على الاسماء الي جاية من اللينك لحد رقم كبير علشان يضمن انه هيمشي على كله 
                    if (isset($_GET['correct_ans' . $i]) && isset($_GET['header' . $i])) {
                        $count++;

                        if (!$pageWasRefreshed) {   // بيشوف لو الفحة اتحدثت علشان مش يكرر نفس الكلام في الداتا بايز
                            //  MySubmitOperations::insertResult($user, $quizId, $_GET[$i], $_GET['header' . $i]);
                        }

                        if ((isset($_GET['header' . $i]) && !isset($_GET[$i]))) {

                            echo "<tr style='background: #ff0033'>";
                        } else if (isset($_GET[$i])) {

                            if ($_GET['correct_ans' . $i] == $_GET[$i]) {
                                $successCount++;
                                echo "<tr>";
                            } else {
                                echo "<tr >";
                            }
                        }

                        if (isset($_GET['header' . $i]) && isset($_GET[$i])) {
                            echo "<td>" . $_GET['header' . $i] . "</td>";
                            echo "<td>" . $_GET['correct_ans' . $i] . "</td>";
                            echo "<td>" . $_GET[$i] . "</td>";
                        } else if (isset($_GET['header' . $i]) && !isset($_GET[$i])) {

                            echo "<td>" . $_GET['header' . $i] . "</td>";
                            echo "<td>" . $_GET['correct_ans' . $i] . "</td>";
                            echo "<td>" . 'No Answer' . "</td>";
                        }
                        echo "</tr>";
                    }
                }
                echo $count . "     ::  result     ";
                if ($count != 0) {
                    $result = $successCount * ($fullMark / $count);
                    echo $result;
                } else {
                    echo "0";
                }
                if (!$pageWasRefreshed) {   // بيشوف لو الفحة اتحدثت علشان مش يكرر نفس الكلام في الداتا بايز
                    //    MySubmitOperations::submit($_SESSION['userid'], $quizId, $result, $makerid);
                }
                ?>
            </table>
        </div>
    </body>
</html>
