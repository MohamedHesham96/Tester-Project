<?php
//include './Header.php';
include '../controller/CreateQuizOperations.php';
?>

<html>
    <head>
        <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>

        <?php //CreateQuizOperations::addQuiz() ?>

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

        <button><a href="CreateQuestion.php">Add New Questions</a></button>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <table class="container table-striped"> 
            <tr>	
                <th>Quiz code</th>
                <th>Quiz Name</th>
                <th>Doctor name</th>
                <th>Mark</th>
                <th>Time</th>
                <th>Password</th>
            </tr>

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

