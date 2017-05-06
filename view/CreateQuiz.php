<?php
        session_start();

include '../controller/CreateQuizOperations.php';
?>

<html>
    <head>
           <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/styletable.css" rel="stylesheet" type="text/css"/>
     
    </head>

    <body>

        <?php
        if (isset($_GET['submitstate']) != "true") {
            CreateQuizOperations::addQuiz();
        }
        ?>

        <div class="col-lg-12"> 

            <div style="background: #EEE" class="col-lg-12 btn-lg">

                <div class="col-lg-3">
                    <label>Quiz Name :<small></small></label>
                    <input class="form-control" type="text" placeholder="Enter Quiz Name"  name="time">
                </div>

                <div class="col-lg-3">
                    <label>Time :<small></small></label>
                    <input class="form-control" type="time" placeholder="Enter Quiz Time"  name="time">
                </div>


                <div class="col-lg-3">

                    <label>Full Mark :<small></small></label>
                    <input class="form-control" type="text"  placeholder="Enter Quiz Full Mark" name="fullmark" >

                </div>

                <div class="col-lg-3">

                    <label>Password :<small></small></label>
                    <input class="form-control" type="text"  placeholder="Enter Quiz Passwrod" name="password" >

                </div>
            </div>
        </div>
        <br>        <br>
        <br>
        <br>
        <br>

        <button class="col-lg-4 btn" ><a href="CreateQuestion.php">Add New Questions</a></button>
        <?php
        if (!isset($_GET['deletequiz'])) {
            $question = "javascript:return confirm('Are you Sure you Want to Delete This Quiz?');";
            echo '<button class="col-lg-4 btn" onClick= "' . $question . '" ><a href="DeleteQuizNotDone.php">Remove This Quiz</a></button>';
        }if (isset($_GET['submitstate']) == "true") {
            
            $question = "javascript:return confirm('Are you Sure you Want to Submit this Quiz?');";
            echo '<button class="col-lg-4 btn" onClick= "' . $question . '" ><a href="AddNewQuiz.php?quizname=H&fullmark=30&password=123">Submit This Quiz</a></button>';
        }
        ?>


        <br>  
        <br>
        <br>

        <br>

        <table class=" containerr table-striped"> 
            <tr>	
                <th>Qeustion</th>
                <th>Answer (A)</th>
                <th>Answer (B)</th>
                <th>Answer (C)</th>
                <th>Answer (D)</th>
                <th>Correct Answer</th>
            </tr>



            <?php
            if (!isset($_GET['deletequiz'])) {
                $quizID = CreateQuizOperations::getQuizID($_SESSION['username']);
                $result = CreateQuizOperations::getQuestions($quizID);


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
            }
            ?>
        </table>

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

