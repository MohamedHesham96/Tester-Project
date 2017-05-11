<?php
 include './header.php';
include '../controller/CreateQuizOperations.php';
?>

<html>
    <head>
        <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <br>       
        <br>
        <div style="background: #109CFF; border-radius: 3%" class="col-sm-8 col-sm-offset-2 ">
            <br>
            <div class="wizard-header">
                <form  id="Form" method="GET">
                    <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->
                    <div id="div1q1" style="background: #eee; border-radius: 3%; margin-left: 15"  class="col-lg-8">

                        <div class="col-lg-12">

                            <br>
                            <label>Question<small></small></label>
                            <input class="form-control" type="text" value="How Are You ?"  placeholder="" name="question" >
                        </div>

                        <div class="col-lg-8">

                            <br>
                            <input class="" type="radio" onclick="getCorrectAnswer(document.getElementById('ans1').value)"  placeholder="" name="ansradio" > 
                            <label>Answer (A)</label>
                            <br>
                            <input id="ans1" class="form-control"  type="text"  placeholder="" name="ans1" value="" required> 

                            <br>
                            <input  class="" type="radio" onclick="getCorrectAnswer(document.getElementById('ans2').value)"  placeholder="" name="ansradio" > 
                            <label>Answer (B)</label>
                            <br>

                            <input id="ans2" class="form-control" type="text"  placeholder="" name="ans2" value="" required>
                            <br>

                            <div id="container" style="display: none"><input type="radio" onclick="getCorrectAnswer(document.getElementById('ans3').value)" name = "ansradio" > <label>Answer (C)
                                </label><button class="btn-fill btn-danger pull-right" id="remove" type="button" onclick="removeans3()"> X </button>
                                <input id="ans3" class="form-control" name="ans3" required><br></div>

                            <div id="container2" style="display: none">

                                <input id="radio4" type="radio" onclick="getCorrectAnswer(document.getElementById('ans4').value)"  name = "ansradio" > <label>Answer (D)
                                </label><button class="btn-fill btn-danger pull-right" id="remove" type="button" onclick="removeans4()"> X </button>
                                <input id="ans4" class="form-control" name="ans4" required>
                            </div>
                            <br>
                            <label>Correct Answer</label>
                            <input id="correctans" style="color: #fff;background: #05AE0E" class="form-control" type="text"  placeholder="" name="correctans" required readonly>
                            <br>

                            <div style="margin-left: 13" class="col-lg-4 col-lg-pull-1">
                                <button  class="btn btn-fill btn-info" id="newans" type="button" onclick="Add()">Add New Answer</button>
                            </div>
                            <div style="margin-left: 10" class="col-lg-1 col-lg-offset-3">
                                <button  class="btn btn-fill btn-primary" id="" type="button" onclick="submitForm('AddNewQuestion.php')"> Next </button>
                            </div>
                            <div style="margin-left: 35" class="col-lg-offset-1 col-lg-4">
                                <button  class="btn btn-fill btn-danger" id="" type="button" onclick="submitForm('FinishQuiz.php')"> Finish </button>
                                <br>
                                <br>
                            </div>

                        </div>
                    </div>
                    <input hidden name="submitstate" value="true">

                </form>
            </div>
        </div>
        <br>

        <script type="text/javascript">

            function submitForm(action) {

                $value = document.getElementById('correctans').value; // check if the correct asnwer is not empty before submit
                $value1 = document.getElementById('ans1').value;
                $value2 = document.getElementById('ans2').value;
                $value3 = "3";
                $value4 = "4";
                if ($("#container").is(":visible")) {
                    $value3 = document.getElementById('ans3').value;
                    if ($("#container2").is(":visible")) {
                        $value4 = document.getElementById('ans4').value;
                    }

                }

                if (!$value1 || !$value2 || !$value3 || !$value4) {
                    alert("Fill Empty Answers !!");
                } else if ($value) {
                    document.getElementById('Form').action = action;
                    document.getElementById('Form').submit();
                } else {
                    alert("Please Choice Correct Answer !!");
                }
            } // end of submit function 

            $aNum = 2; // form condetion 3 for ans3 and 4 for ans4 بعد كده مش مهم لانه بعد كده هيعتمد على الظهور بتاع كل واحدة 

            function Add() {

                $aNum++;
                if (!$("#container").is(":visible")) { // show answer 3 input

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
