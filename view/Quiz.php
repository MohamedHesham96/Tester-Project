<?php include './Header.php'; ?>
<!--make information displayed in center of page -->
<html>  
    <head>

    </head>
    <?php
    include '../controller/MyQuizzesOperations.php';
    $userType = $_SESSION['usertype'];
    $submitState = "";
    if ($userType != "student")    //بتحدد ظهور زرار السابمت على اساس نوع المستخدم لو ادمن مش هيظهر
        $submitState = "hidden";


    $name = $_GET['name'];
    $quizId = $_GET['id'];
    $maker = $_GET['maker'];
    $fullMark = $_GET['fullmark'];

    $result = MyQuizzesOperations::getQuizQuestionsByID($quizId); // get all data


    echo ' <div class="" id=" Quiz-details" style="text-align: center"> <br><br>';

    echo "Quiz id    : $quizId <br><br>"; // display quiz id
    echo "Quiz name  : $name <br><br>"; // display quiz name
    echo "Full Mark  : $fullMark <br><br>"; // display quiz name

    echo "Quiz maker : <a href='../controller/FollowingManager.php?outprofile=true&followname=$maker'>$maker</a><br><br>"; //may be go to doctor profile
    echo ' </div>';

    echo '    <div style="margin-right: 200; padding-left: 200"> 
';
    if (!$result) {
        echo 'Quiz Page Error !!';
    } else {

        $ans3state = "";  // to show the third answer of not 
        $ans4state = "";  // to show the fourht answer of not 

        $qnum = 1;

        while ($row = mysqli_fetch_array($result, 1)) {

            $tempRow = array();
            $result2 = MyQuizzesOperations::getAnsOnly($row['Header']); // get the 4 ansers only to able to show randomly 

            if ($ansRow = mysqli_fetch_array($result2, 1)) {


                if (!$ansRow['answer_3']) {

                    $ans3state = "hidden";
                    $ans4state = "hidden";

                    $tempRow[0] = $ansRow['answer_1'];
                    $tempRow[1] = $ansRow['answer_2'];
                    $ansRow = $tempRow;

                    shuffle($ansRow);
                } else if (!$ansRow['answer_4']) {

                    $ans3state = "";
                    $ans4state = "hidden";

                    $tempRow[0] = $ansRow['answer_1'];
                    $tempRow[1] = $ansRow['answer_2'];
                    $tempRow[2] = $ansRow['answer_3'];

                    $ansRow = $tempRow;
                    shuffle($ansRow);
                } else {

                    shuffle($ansRow);
                }
            }
            //get information from prevoius page which clicked by the user
            ?>

            <form action="MySubmit.php" method="GET">


                <div style="color: #00f; display: block; font-size: 20; height: 40; margin-bottom: 10" class="form-control col-lg-2 btn-block" >
                    <label  id="" class="">  
                        <?php echo $qnum++ . ". " . $row['Header']; ?> 
                    </label>    
                </div>
                <br>
                <br>

                <input  name="<?php echo 'correct_ans' . $row['question_id']; ?>" type="hidden" value="<?php echo $row['correct_answer']; ?>"/>  


                <div style="display: block; background: #eee" class=" col-md-2  btn-block " >

                    <input   name="<?php echo $row['question_id']; ?>" type="radio"  value="<?php echo $ansRow[0]; ?>" readonly="readonly"/> 

                    <label class="choice" > 
                        <span style="font-size: 20; font-family: cursive" class="choice__text notranslate"><?php echo $ansRow[0]; ?></span>
                    </label>  
                </div>

                <div style="display: block; background: #eee" class="col-md-2 btn-block " >
                    <input  name="<?php echo $row['question_id']; ?>" type="radio" class="" value="<?php echo $ansRow[1]; ?>"  readonly="readonly"/>

                    <label class="choice" > 
                        <span style="font-size: 20; font-family: cursive" class="choice__text notranslate"><?php echo $ansRow[1]; ?></span> 
                    </label>  
                </div>


                <div style="visibility: <?php echo $ans3state; ?>; display: block; background: #eee" class="col-md-2 btn-block " >
                    <input <?php echo $ans3state; ?> name="<?php echo $row['question_id']; ?>" type="radio" value="<?php echo $ansRow[2]; ?>"   readonly="readonly" /> 

                    <label <?php echo $ans3state; ?> class=""  >
                        <span style="font-size: 20; font-family: cursive" class="choice__text notranslate"><?php echo $ansRow[2]; ?></span>
                    </label> 
                </div>

                <div  style="visibility: <?php echo $ans4state; ?>;display: block; background: #eee" class="col-md-2 btn-block" >

                    <input name="<?php echo $row['question_id']; ?>" type="radio"  value="<?php echo $ansRow[3]; ?>"  readonly="readonly" /> 

                    <label class=""  >
                        <span style="font-size: 20; font-family: cursive" class="choice__text notranslate"><?php echo $ansRow[3]; ?></span>
                    </label> 
                </div>
            <?php } ?>

        <?php } ?>


        <input  style="visibility: <?php echo $submitState ?>" class="btn-success btn col-lg-2" type="submit" value="SUBMIT" > 

        <input  name="quizname" type="text" value="<?php echo $_GET['name']; ?>"  readonly="readonly" hidden/> 
        <input  name="quizid" type="text" value="<?php echo $_GET['id']; ?>"  readonly="readonly" hidden/> 
        <input  name="quizdoctor" type="text" value="<?php echo $_GET['maker']; ?>"  readonly="readonly" hidden/> 
        <input  name="quizfullmark" type="text" value="<?php echo $_GET['fullmark']; ?>"  readonly="readonly" hidden/> 

    </form>        
</div>
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