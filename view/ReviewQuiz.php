<?php
include '../controller/CreateQuizOperations.php';
include './Header.php';
?>
<html>
    <head><link href = "../recources/css/style.css" rel = "stylesheet" />
    </head>
    <body>

        <?php
        $pass = $_GET['pass'];
        $quizName = $_GET['name'];
        $maker = $_GET['maker'];
        $fullMark = $_GET['fullmark'];
        $time = $_GET['time'];
        ?>
        <div class="col-lg-12"> 

            <div style="background: #EEE" class="col-lg-12 btn-lg">

                <div class="col-lg-3">
                    <label>Quiz Name :<small></small></label>
                    <input value="<?php echo $quizName; ?>" class="form-control"  type="text" placeholder="Enter Quiz Name"  name="time">
                </div>

                <div class="col-lg-3">
                    <label>Time :<small></small></label>
                    <input value="<?php echo $time; ?>" class="form-control" type="text" placeholder="Enter Quiz Time"  name="time">
                </div>


                <div class="col-lg-3">

                    <label>Full Mark :<small></small></label>
                    <input value="<?php echo $fullMark; ?>" class="form-control" type="text"  placeholder="Enter Quiz Full Mark" name="fullmark" >

                </div>

                <div class="col-lg-3">

                    <label>Password :<small></small></label>
                    <input value="<?php echo $pass; ?>" class="form-control" type="text"  placeholder="Enter Quiz Passwrod" name="password" >

                </div>
            </div>
        </div>

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