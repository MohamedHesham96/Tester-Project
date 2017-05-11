<?php
include '../controller/CreateQuizOperations.php';

session_start();


//$quizID = CreateQuizOperations::getQuizID($doctorName);
//CreateQuizOperations::addQuizFullInfo($quizID, $quizName, $doctorID, $password, $fullMark, $doctorName);
?>

<html><head>
        <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>

    </head>

    <body>
        <?php
        if (isset($_GET['name'])) {
            if ($_GET['name'] != "") {
                $quizName = $_GET['name'];
                $result = CreateQuizOperations::getQuizByName($quizName);

                if ($result) {
                    ?>
                    <script type="text/javascript">

                        alert("Name is REPEATED !!");

                    </script>

                    <?php
                } else {
                    $doctorID = $_SESSION['userid'];
                    $doctorName = $_SESSION['username'];

                    $quizName = $_GET['name'];
                    $pass = $_GET['password'];
                    $fullMark = $_GET['fullmark'];

                    $quizID = CreateQuizOperations::getQuizID($doctorName);
                    CreateQuizOperations::addQuizFullInfo($quizID, $quizName, $doctorID, $pass, $fullMark, $doctorName);
                    echo '<script>document.location.href="Myquizzes.php"</script>';
                }
            }
        }
        ?>
        <div class="col-lg-12"> 

            <div style="background: #EEE" class="col-lg-12 btn-lg">

                <form name="form" action="AddNewQuiz.php" method="GET">
                    <div class="col-lg-3">
                        <label>Quiz Name :<small></small></label>
                        <input class="form-control" type="text" placeholder="Enter Quiz Name"  name="name" required>
                    </div>


                    <div class="col-lg-3">
                        <label>Time :<small></small></label>
                        <input id="time" onkeyup="validateHhMm(this)" value="" class="form-control" placeholder="Enter Quiz Time... (Minutes)"  name="time" >
                    </div>


                    <div class="col-lg-3">

                        <label>Full Mark :<small></small></label>
                        <input class="form-control" type="text" onkeyup="validateHhMm(this)"  placeholder="Enter Quiz Full Mark" name="fullmark" required>

                    </div>

                    <div class="col-lg-3">

                        <label>Password :<small></small></label>
                        <input class="form-control" type="text"  placeholder="Enter Quiz Passwrod" name="password" >

                    </div>

                    <input id="addquiz" name="addquiz" value="true" hidden>

                    <button type="button"  onclick="submitss()" name="addquiz">Submit</button>

                </form>

            </div>
        </div>
        <script type="text/javascript">


            function submitss() {
                {
                    inputField = document.getElementById("time");
                    inputField2 = document.getElementById("fullmark");

                    if (confirm("Are You Sure You Want submit This Settings ?")) {
                        if (validateHhMm(inputField)) {
                            //       document.form.submit();
                            alert("Er: Please Enter Correct Format To Time !");
                            if (validateHhMm(inputField2)) {
                                //       document.form.submit();
                                alert("Er: Please Enter Correct Format To Time !");
                            } else {
                                alert("Please Enter Correct Format To Time !");
                            }
                        } else {
                            alert("Please Enter Correct Format To Time !");
                        }
                    }
                }
            }

            function validateHhMm(inputField) {
                var isValid = /^([1-9]|[1-9]?[0-9]?[0-9]?[0-9]?[0-9])?$/.test(inputField.value);

                if (isValid) {
                    inputField.style.backgroundColor = '#bfa';
                } else if (!isValid) {
                    inputField.style.backgroundColor = '#fba';
                } else {
                    inputField.style.backgroundColor = '#fff';
                }

                return isValid;
            }
        </script>

        <script src="../recources/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="../recources/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../recources/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

        <!--  Plugin for the Wizard -->
        <script src="../recources/js/gsdk-bootstrap-wizard.js"></script>

        <!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
        <script src="../recources/js/jquery.validate.min.js"></script>

    </body></html>

