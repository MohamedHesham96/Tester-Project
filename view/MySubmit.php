<?php
include './Header.php';
include '../controller/MySubmitOperations.php';
?>
<html>
    <head>
    </head>
    <body >


        <?php
        $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

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

            <table class="containerr"> 
                <tr>	
                    <td>Question Header</td>
                    <td>Correct Answer</td>
                    <td>Your Answer</td>
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
                                echo "<tr style='background: #00ff00'>";
                            } else {
                                echo "<tr style='background: #ff0033'>";
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
        <link href="../recources/js/bootstrap.min.js" rel="stylesheet" type="text/javascript"/>
    </body>
</html>
