<?php
include '../controller/CreateQuizOperations.php';

session_start();


//$doctorID = $_SESSION['userid'];
//$doctorName = $_SESSION['username'];
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
                    echo 'ok';
                }
            }
        }
        ?>
        <div class="col-lg-12"> 

            <div style="background: #EEE" class="col-lg-12 btn-lg">

                <form name="form" action="AddNewQuiz.php" method="GET">
                    <div class="col-lg-3">
                        <label>Quiz Name :<small></small></label>
                        <input class="form-control" type="text" placeholder="Enter Quiz Name"  name="name"required>
                    </div>


                    <div class="col-lg-3">
                        <label>Time :<small></small></label>
                        <input id="time" onkeyup="validateHhMm(this)" value="" class="form-control" placeholder="Enter Quiz Time...       HH:MM:SS"  name="time" >
                    </div>


                    <div class="col-lg-3">

                        <label>Full Mark :<small></small></label>
                        <input class="form-control" type="text"  placeholder="Enter Quiz Full Mark" name="fullmark" required>

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
                    document.form.submit();

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

