<?php
//session_start();
include './Header.php';
include '../controller/CreateQuizOperations.php';
?>

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

    <body>
        <div class="container">
        <div class="col-lg-6"> 

            <div style="background: #EEE" class="col-lg-12 btn-lg">

                <form id="form" action="CreateQuestion.php" method="GET">
                    <input id="addquiz" name="addquiz" value="true" hidden>
                </form>
            </div>
        </div>
        


        <?php
        if (isset($_GET['qdelete']) and isset($_GET['qheader'])) {

            $quiz_id = $_GET['qdelete'];
            $header = $_GET['qheader'];

            CreateQuizOperations::deleteQuestion($quiz_id, $header);
        }

        if (isset($_GET['submitstate'])) {
            echo '  <button  type="submit" onclick="submit(1)" class = "col-lg-4 btn" >Add New Qestion</button>';
        } else {
            echo '  <button  type="submit" onclick="submit(2)" class = "col-lg-4 btn" >Add New Questions</button>';
        }

        if (!isset($_GET['deletequiz'])) {
            $question = "javascript:return confirm('Are you Sure you Want to Delete This Quiz?');";
            echo '<button class="col-lg-4 btn" onClick= "' . $question . '" ><a href="DeleteQuizNotDone.php">Remove This Quiz</a></button>';
        }
        if (isset($_GET['submitstate']) == "true") {
            $question = "javascript:return confirm('Are you Sure you Want to Submit this Quiz?');";
            echo '<button class="col-lg-4 btn" onClick= "' . $question . '" ><a href="AddNewQuiz.php">Submit This Quiz</a></button>';
        }
        ?>


        <br>  
        <br>
        <br>

        <br>
        
        <table class="containerr table"> 
            <tr>	
                <th>Qeustion</th>
                <th>Answer (A)</th>
                <th>Answer (B)</th>
                <th>Answer (C)</th>
                <th>Answer (D)</th>
                <th>Correct Answer</th>
            </tr>



            <?php
            if (!isset($_GET['deletequiz']) && isset($_GET['submitstate'])) {

                $quizID = CreateQuizOperations::getQuizID($_SESSION['username']);
                $result = CreateQuizOperations::getQuestions($quizID);

                while ($row = mysqli_fetch_assoc($result)) {
                    $header = $row['header'];
                    $removeIcon = "<img src = '../recources/images/Remove_User.png' height = '32'>";
                    echo "<tr>";
                    echo "<td>" . $row['header'] . "</td>";
                    echo "<td>" . $row['answer_1'] . "</td>";
                    echo "<td>" . $row['answer_2'] . "</td>";
                    echo "<td>" . $row['answer_3'] . "</td>";
                    echo "<td>" . $row['answer_4'] . "</td>";
                    echo "<td>" . $row['correct_answer'] . "</td>";
                    echo "<td><a  onClick=\"javascript:return confirm('Are you Sure you Want to Delete This Question?');\" href = 'CreateQuiz.php?qdelete=$quizID&qheader=$header'>" . $removeIcon . "</a></td>";
                    echo '</tr>';
                }
            }
            ?>
        </table>
        </div>
        <script type="text/javascript">


            function submit(id) {

                if (id == 1) {
                    document.getElementById('addquiz').value = "true";
                    $("#form").submit();
                } else {
                    $("#form").submit();
                }
            }

            function validateHhMm(inputField) {
                var isValid = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/.test(inputField.value);

                if (isValid) {
                    inputField.style.backgroundColor = '#bfa';
                } else {
                    inputField.style.backgroundColor = '#fba';
                }

                return isValid;
            }</script>
    </body>

    <!--   Core JS Files   -->
    <script src="../recources/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="../recources/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../recources/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

    <!--  Plugin for the Wizard -->
    <script src="../recources/js/gsdk-bootstrap-wizard.js"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
    <script src="../recources/js/jquery.validate.min.js"></script>

</html>

