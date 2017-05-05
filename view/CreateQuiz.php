<?php // include './header.php';
?>

<html>
    <head>
        <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>

    </head>

    <body>
        <?php
        //     session_destroy();
        $massage = ""; // for username hint
        $massage2 = ""; // for emai  hint

        if (isset($_GET['errors'])) {

            if ($_GET['errors'] == "usernameerror")
                $massage = "This Username is Already Exist !";

            else if ($_GET['errors'] == "emailerror") {
                $massage2 = "This Email is Already Exist !";
            }
        }
        ?>

        <br>       
        <br>

        <div style="background: #109CFF; border-radius: 3%" class="col-sm-8 col-sm-offset-2 ">

            <br>            <br>

            <div class="wizard-header">
                <form action="signUp.php" method="GET">
                    <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->
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

                        <div><br><br><br><br><br><br><br></div>

                        <div id="div1q1" style="background: #eee; border-radius: 3%" class="col-lg-8">

                            <div class="col-lg-12">

                                <br>
                                <label>Question<small></small></label>
                                <input class="form-control" type="text" value="How Are You ?"  placeholder="" name="question" >
                            </div>

                            <div class="col-lg-7">

                                <br>
                                <input class="" type="radio" onclick="getCorrectAnswer(document.getElementById('ans1').value)"  placeholder="" name="ansradio" > 
                                <label>Answer (A)<small style="color: #999"> (required)</small></label>
                                <br>
                                <input id="ans1" class="form-control"  type="text"  placeholder="" name="ans1" value="Good" required> 

                                <br>
                                <input  class="" type="radio" onclick="getCorrectAnswer(document.getElementById('ans2').value)"  placeholder="" name="ansradio" > 
                                <label>Answer (B)<small style="color: #999"> (required)</small></label>
                                <br>
                                <input id="ans2" class="form-control" type="text"  placeholder="" name="ans2" value="Bad" required>
                                <br>

                                <div id="container"></div>

                                <label>Correct Answer</label>
                                <input id="correctans" style="color: #fff;background: #05AE0E" class="form-control" type="text"  placeholder="" name="correctans" readonly>
                                <br>

                                <div style="margin-left: 13" class="col-lg-4 col-lg-pull-1">
                                    <button  class="btn btn-fill btn-info" id="newans" type="button" onclick="Add()">Add New Answer</button>
                                </div>
                                <div style="margin-left: 10" class="col-lg-1 col-lg-offset-3">
                                    <button  class="btn btn-fill btn-primary" id="newans" type="button" onclick=""> Next  </button>
                                </div>


                                <div style="margin-left: 35" class="col-lg-offset-1 col-lg-4">
                                    <input  type="submit" class="btn btn-fill btn-danger" id="newquestion" onclick="AddQuestion()" value="Finish">
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <br>
        </div>

        <script type="text/javascript">

            $aNum = 2; // form condetion 3 for ans3 and 4 for ans4 بعد كده مش مهم لانه بعد كده هيعتمد على الظهور بتاع كل واحدة 

            function Add() {

                $aNum++;

                if ($aNum == 3) { // add answer 3 input

                    $("#container").append('<input type="radio" onclick="getCorrectAnswer(document.getElementById(\'ans3\').value)" name = "ansradio" > <label>Answer (C)\n\
                    </label><button class="btn-fill btn-danger pull-right" id="remove" type="button" onclick="removeans3()"> X </button>\n\
                    <input id="ans3" class="form-control" name="ans3" ><br></div><div id="container2">');

                } else if ($aNum == 4) { // add answer 4 input 

                    $("#container2").append('<input id="radio4" type="radio" onclick="getCorrectAnswer(document.getElementById(\'ans4\').value)"  name = "ansradio" > <label>Answer (D)\n\
                     </label><button class="btn-fill btn-danger pull-right" id="remove" type="button" onclick="removeans4()"> X </button>\n\
                     <input id="ans4" class="form-control" name="ans4" ><br>');
                    $("#newans").attr("disabled", "disabled");

                } else if (!$("#container").is(":visible")) { // show answer 3 input

                    $("#container").slideDown(1000);

                } else if (!$("#container2").is(":visible")) {  // show answer 4 input

                    $("#container2").slideDown(1000);
                    document.getElementById("newans").disabled = true;
                }

            }

            function removeans3() {
                document.getElementById("newans").disabled = false;

                if (!$("#container2").is(":visible")) { // remove answer 3 input

                    document.getElementById("ans3").value = "";
                    $("#container").slideUp(1000);

                } else {        // switch answer4 input value with answer and hide answer4 input 
                    $value1 = document.getElementById("ans4").value;
                    document.getElementById("ans3").value = $value1;
                    document.getElementById("ans4").value = "";
                    document.getElementById("ans4").value = "";
                    $("#container2").slideUp(1000);
                }
            }

            function removeans4() { // hide answer4 
                document.getElementById("newans").disabled = false;

                document.getElementById("ans4").value = "";
                $("#container2").slideUp(1000);
            }


            function getCorrectAnswer($value) { // to set answer as a correct answer

                document.getElementById("correctans").value = $value;
            }

            function AddQuestion() {

                $qNum += 1;
                $a1q1 = 'a' + $aNum + 'q' + $qNum;
                $a2q2 = 'a' + $aNum + 'q' + $qNum;

                $("#con").append('<div  style="border-radius: 10%;background: #bbbbbb" class="col-lg-8"><div></div><div class="col-lg-12"><br>\n\
                <label>Question<small></small></label><input class="form-control" type="text"  placeholder="" name="" required></div>\n\
                <div class="col-lg-7"><br><input class="" type="radio"  placeholder="" > <label>Answer (A)<small></small></label>\n\
                <input class="form-control" type="text"  name=' + $a1q1 + ' value=' + $a1q1 + '  placeholder="" name="phone" required>\n\
                <br>\n\
                <input class="" type="radio"  placeholder="" name=""> <label>Answer (B)<small></small></label>\n\
                <input class="form-control" type="text"  placeholder="" name="c1q1" ><br>\n\
                <label>Correct Answer<small></small></label><input style="color: #fff;background: #05AE0E" class="form-control" type="tel"  placeholder="" name="phone" ><br></div></div>');
            }



        </script>


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
