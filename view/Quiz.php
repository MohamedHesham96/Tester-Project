<!--make information displayed in center of page -->
<html>  
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../recources/images/apple-icon.png">
        <link rel="icon" type="image/png" href="../recources/images/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Get Shit Done Bootstrap Wizard by Creative Tim</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- CSS Files -->
        <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href= "../recources/css/demo.css" rel="stylesheet" />
    </head>


    <?php
    include './header.php';
    include '../controller/MyQuizzesOperations.php';
    $name = $_GET['name'];
    $quizId = $_GET['id'];
    $maker = $_GET['maker'];

    $result = MyQuizzesOperations::getQuizQuestionsByID($quizId);

    $result2 = MyQuizzesOperations::getAnsOnly($quizId);

    echo ' <div class="" id=" Quiz-details" style="text-align: center"> <br><br>';

    echo "Quiz id    : $quizId <br><br>"; // display quiz id
    echo "Quiz name  : $name <br><br>"; // display quiz name
    echo "Quiz maker : <a href='../controller/followingmanager.php?outprofile=true&followname=$maker'>$maker</a><br><br>"; //may be go to doctor profile
    echo ' </div>';


    if (!$result) {
        echo 'Quiz Page Error !!';
    } else {

        while ($row = mysqli_fetch_array($result, 1)) {

            if ($ansRow = mysqli_fetch_array($result2, 2))
                shuffle($ansRow);

            //get information from prevoius page which clicked by the user
            ?>

            <form action="mySubmit.php" method="GET">

                <div class="form-group">

                    <label  id="title5" class="form-control">  
                        <?php echo $row['header']; ?> 
                    </label>  <![endif]-->  
                    <input  name="<?php echo 'correct_ans' . $row['question_id']; ?>" type="hidden" value="<?php echo $row['correct_answer']; ?>"/>  

                    <span>
                        <input  name="<?php echo $row['question_id']; ?>" type="radio" class="field radio" value="<?php echo $ansRow[1]; ?>" readonly="readonly"/> 
                        <label class="choice" > 
                            <span class="choice__text notranslate"><?php echo $ansRow[0]; ?></span>
                        </label>  

                    </span>

                    <span > 
                        <input name="<?php echo $row['question_id']; ?>" type="radio" class="field radio" value="<?php echo $ansRow[1]; ?>"  readonly="readonly"/>
                        <label class="choice" > 
                            <span class="choice__text notranslate"><?php echo $ansRow[1]; ?></span> 
                        </label>  
                    </span> 

                    <span>  
                        <input name="<?php echo $row['question_id']; ?>" type="radio" class="field radio" value="<?php echo $row['answer_3']; ?>"   readonly="readonly" /> 
                        <label class="choice"  >
                            <span class="choice__text notranslate"><?php echo $ansRow[2]; ?></span>
                        </label> 
                    </span>

                    <span>  
                        <input name="<?php echo $row['question_id']; ?>" type="radio" class="field radio" value="<?php echo $row['answer_4']; ?>"  readonly="readonly" /> 
                        <label class="choice"  >
                            <span class="choice__text notranslate"><?php echo $ansRow[3]; ?></span>
                        </label> 
                    </span>




                <?php } ?>

            <?php }
            ?>

            <br>    <br>

            <input type="submit" value="Done!"> 
        </div> 

        <input  name="quizname" type="text" value="<?php echo $_GET['name']; ?>"  readonly="readonly" hidden/> 
        <input  name="quizid" type="text" value="<?php echo $_GET['id']; ?>"  readonly="readonly" hidden/> 
        <input  name="quizdoctor" type="text" value="<?php echo $_GET['maker']; ?>"  readonly="readonly" hidden/> 

    </form>        

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