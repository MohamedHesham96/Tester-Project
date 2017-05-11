<?php
include './Header.php';
include '../controller/MyQuizzesOperations.php';
$quizId = $_GET['id'];
$result = MyQuizzesOperations::getQuizById($quizId);
$row = mysqli_fetch_array($result);
$time = $row['time'] * 1000 * 60;
?>
<!--make information displayed in center of page -->
<html>  
    <head>
        <link href="../recources/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />
<!--        <script type="text/javascript" >
                    $(function () {  // document.ready function...
                        setTimeout(function () {
                        }, 10000);
                    });
        </script>-->
    </head>
    <body>
        <?php if ($time != 0 && $_SESSION['usertype'] == 'student') { ?>     
            <div id="Mydiv" style="margin-right: 100px;color:#494BCB;font-family: cursive; font-size: 26px;border-radius: 5px ;border: 1px #FFED00 solid;max-width:120px ; max-height: 100px;float: right; position: fixed;">       
                <script>

                    // Set the date we're counting down to
                    var countDownDate = new Date().getTime() + <?php echo $time ?>;
                    // Update the count down every 1 second
                    var x = setInterval(function () {

                        // Get todays date and time
                        var now = new Date().getTime();
                        // Find the distance between now an the count down date
                        var distance = countDownDate - now;

                        // Time calculations for days, hours, minutes and seconds
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                        // Display the result in the element with id="demo"
                        document.getElementById("Mydiv").innerHTML = hours + "h "
                                + minutes + "m " + seconds + "s ";

                        if (minutes < 1)
                        {
                            var x = document.getElementById("Mydiv");
                            x.style.color = '#FF0021';
                        }
                        // If the count down is finished, write some text 
                        if (distance < 0) {
                            clearInterval(x);
                            document.getElementById("Mydiv").innerHTML = "EXPIRED";
                            $('form').submit();

                        }
                    }, 1000);

                </script>
            </div>
            <?php
        }
        ?>
        <?php
        $userType = $_SESSION['usertype'];
        $submitState = "";
        if ($userType != "student")    //بتحدد ظهور زرار السابمت على اساس نوع المستخدم لو ادمن مش هيظهر
            $submitState = "hidden";


        $name = $row['quiz_name'];
        $maker = $row['doctor_name'];

        if ($_SESSION['usertype'] == 'doctor') {

            $fullMark = $row['full_mark'];
        }

        if ($_SESSION['usertype'] == 'student') {

            $fullMark = $row['full_mark'];
            $makerId = $row['doctor_id'];
        }

        $result = MyQuizzesOperations::getQuizQuestionsByID($quizId); // get all data

        echo ' <div class="" id=" Quiz-details" style="text-align: center"> <br><br>';

        echo "Quiz id    : $quizId <br><br>"; // display quiz id
        echo "Quiz name  : $name <br><br>"; // display quiz name
        if ($_SESSION['usertype'] == 'student' || $_SESSION['usertype'] == 'doctor') {
            echo "Full Mark  : $fullMark <br><br>"; // 
        }
        if ($_SESSION['usertype'] == 'student')
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
            echo '<div class = "wizard-card col-lg-12">';
            echo '<div class = "col-lg-10 col-lg-push-1">';

            while ($row = mysqli_fetch_array($result, 1)) {

                $tempRow = array();
                $result2 = MyQuizzesOperations::getAnsOnly($row['Header'], $quizId); // get the 4 ansers only to able to show randomly 

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
                ?>

                <form action="MySubmit.php" method="GET" id="form">
                    <br>                <br>

                    <div>
                        <div style="margin-bottom: -28; margin-left: -35">
                            <span style="border-radius: 20%; background: #ffffff; color: #00f; padding: 5; height: 50; font-size: 20 ;" > <?php echo "(" . $qnum++ . ")" ?> </span> 
                        </div>
                        <div>
                            <input  style="margin-top: 2; color: #00f; display: block; font-size: 22; height: 40; margin-bottom: 10" name = "header<?php echo $row['question_id']; ?>" 
                                    class = "form-control btn-block" value = "<?php echo $row['Header']; ?>" readonly>  
                        </div>
                    </div>

                    <input  name="<?php echo 'correct_ans' . $row['question_id']; ?>" type="hidden" value="<?php echo $row['correct_answer']; ?>"/>  


                    <div style="display: block; background: #eee" class="col-md-2 btn-block " >
                        <input name="<?php echo $row['question_id']; ?>" type="radio" value="<?php echo $ansRow[0]; ?>"   readonly="readonly" /> 

                        <label class=""  >
                            <span style="font-size: 20; font-family: cursive" class="choice__text notranslate"><?php echo ' A) ' . $ansRow[0]; ?></span>
                        </label> 
                    </div>

                    <div style="display: block; background: #eee" class="col-md-2 btn-block " >
                        <input name="<?php echo $row['question_id']; ?>" type="radio" value="<?php echo $ansRow[1]; ?>"   readonly="readonly" /> 

                        <label class=""  >
                            <span style="font-size: 20; font-family: cursive" class="choice__text notranslate"><?php echo ' B) ' . $ansRow[1]; ?></span>
                        </label> 
                    </div>


                    <div style="visibility: <?php echo $ans3state; ?>; display: block; background: #eee" class="col-md-2 btn-block " >
                        <input <?php echo $ans3state; ?> name="<?php echo $row['question_id']; ?>" type="radio" value="<?php echo $ansRow[2]; ?>"   readonly="readonly" /> 

                        <label <?php echo $ans3state; ?> class=""  >
                            <span style="font-size: 20; font-family: cursive" class="choice__text notranslate"><?php echo ' C) ' . $ansRow[2]; ?></span>
                        </label> 
                    </div>

                    <div  style="visibility: <?php echo $ans4state; ?>;display: block; background: #eee" class="col-md-2 btn-block" >

                        <input name="<?php echo $row['question_id']; ?>" type="radio"  value="<?php echo $ansRow[3]; ?>"  readonly="readonly" /> 

                        <label class=""  >
                            <span style="font-size: 20; font-family: cursive" class="choice__text notranslate"><?php echo ' D) ' . $ansRow[3]; ?></span>
                        </label> 
                    </div>

                    <br> <!-- مش عارف ليه لازم اعمل كده ؟  !-->  
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <script>

                    </script>

                <?php } ?>

            <?php } ?>


            <input  style="visibility: <?php echo $submitState ?>" class="btn-success btn col-lg-2" type="submit" value="SUBMIT" > 

            <input  name="quizname" type="text" value="<?php echo $name; ?>"  readonly="readonly" hidden/> 
            <input  name="quizid" type="text" value="<?php echo $quizId; ?>"  readonly="readonly" hidden/> 
            <input  name="quizdoctor" type="text" value="<?php echo $maker; ?>"  readonly="readonly" hidden/> 
            <input  name="quizfullmark" type="text" value="<?php echo $fullMark; ?>"  readonly="readonly" hidden/> 
            <input  name="makerid" type="text" value="<?php echo $makerId; ?>"  readonly="readonly" hidden/> 

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