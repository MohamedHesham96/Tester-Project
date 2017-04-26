<!--make information displayed in center of page -->
<html>  
    <head>

    </head>


    <?php
    include './header.php';
    include '../controller/MyQuizzesOperations.php';
    $name = $_GET['name'];
    $quizId = $_GET['id'];
    $maker = $_GET['maker'];

    $result = MyQuizzesOperations::getQuizQuestionsByID($quizId); // get all data

    $result2 = MyQuizzesOperations::getAnsOnly($quizId); // get the 4 ansers only to able to show randomly 

    echo ' <div class="" id=" Quiz-details" style="text-align: center"> <br><br>';

    echo "Quiz id    : $quizId <br><br>"; // display quiz id
    echo "Quiz name  : $name <br><br>"; // display quiz name
    echo "Quiz maker : <a href='../controller/followingmanager.php?outprofile=true&followname=$maker'>$maker</a><br><br>"; //may be go to doctor profile
    echo ' </div>';


    if (!$result) {
        echo 'Quiz Page Error !!';
    } else {

        $ans3state = "";  // to show the third answer of not 
        $ans4state = "";  // to show the fourht answer of not 

        while ($row = mysqli_fetch_array($result, 1)) {

            if ($ansRow = mysqli_fetch_array($result2, 1)) {

                /*   if (!$ansRow['answer_3']) {
                  $ans3state = "hidden";
                  $ansRow = array_rand($ansRow, 2);
                  } else if (!$ansRow['answer_4']) {
                  $ans4state = "hidden";
                  $ansRow = array_rand($ansRow, 3);
                  } else { */

                shuffle($ansRow);
            }

            //get information from prevoius page which clicked by the user
            ?>

            <form action="mySubmit.php" method="GET">

                <div class="form-group">

                    <label  id="title5" class="form-control">  
                        <?php echo $row['header']; ?> 
                    </label>  <![endif]-->  
                    <input  name="<?php echo 'correct_ans' . $row['question_id']; ?>" type="hidden" value="<?php echo $row['correct_answer']; ?>"/>  
                    <p>
                        <input  name="<?php echo $row['question_id']; ?>" type="radio" class="field radio" value="<?php echo $ansRow[0]; ?>" readonly="readonly"/> 

                        <label class="choice" > 
                            <span class="choice__text notranslate"><?php echo $ansRow[0]; ?></span>
                        </label>  

                        <input name="<?php echo $row['question_id']; ?>" type="radio" class="field radio" value="<?php echo $ansRow[1]; ?>"  readonly="readonly"/>

                        <label class="choice" > 
                            <span class="choice__text notranslate"><?php echo $ansRow[1]; ?></span> 
                        </label>  

                        <input <?php echo $ans3state; ?> name="<?php echo $row['question_id']; ?>" type="radio" class="field radio" value="<?php echo $ansRow[2]; ?>"   readonly="readonly" /> 

                        <label <?php echo $ans3state; ?> class="choice"  >
                            <span class="choice__text notranslate"><?php echo $ansRow[2]; ?></span>
                        </label> 

                        <input <?php echo $ans4state; ?> name="<?php echo $row['question_id']; ?>" type="radio" class="field radio" value="<?php echo $ansRow[3]; ?>"  readonly="readonly" /> 

                        <label <?php echo $ans4state; ?> class="choice"  >
                            <span class="choice__text notranslate"><?php echo $ansRow[3]; ?></span>
                        </label> 


                    </p>


                <?php } ?>

            <?php }
            ?>

            <br>    <br>

            <input class="btn-success btn col-lg-2" type="submit" value="SUBMIT"> 
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