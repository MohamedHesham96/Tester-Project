<html>

    <head>
        <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/style1.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/styletable.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SESSION['usertype'] == 'doctor') {

            $firstTab = 'doctorhome';
            $secondTab = 'myQuizzes';
            $thirdTab = 'Followers';
            //      echo '<div class="btn-primary log"> <button onclick=""><a href="createQuiz.php">Create New Quiz</a></button></div>';
        } else if ($_SESSION['usertype'] == 'student') {
            $firstTab = 'home';

            $secondTab = 'History';
            $thirdTab = 'Subscribes';
        } else if ($_SESSION['usertype'] == 'admin') {
            $firstTab = 'adminhome';

            $secondTab = 'Doctors';
            $thirdTab = 'Students';
        }
        ?>


        <div style="background: #eee; height: 60;" class=" col-lg-12">

            <div  class="">
                <button style="height: 40; margin-top: -3; font-size: 18"  value="login.php" class="btn-danger col-lg-1  btn log" onclick="location = this.value">log out</button> 

                <div style="background: #eee; margin-top: -3"  class="log">

                    <img  style=" display: inline" src = '../recources/images/default-avatar.png' height = '40'>
                    <h4 style="display: inline;">
                        <a href="profilepage.php?name=<?php echo $_SESSION['username'] ?>">         <?php echo $_SESSION['username'] ?> </a>
                    </h4>

                </div>


                <form action="searchPage.php" method="GET">

                    <input  style="height: 40; font-size: 18" class="col-lg-2  btn-lg" placeholder="Search..." class="form-control" name="search" >
                    <input  style="height: 37; font-size: 18" class="col-lg-1 btn btn-success" type="submit" value="Search">


                </form>
            </div>

            <div class="nav">

                <div class="container">
                    <ul>
                        <li><a href="<?php echo $firstTab ?>.php" class="active" >Home</a></li>
                        <li><a href="<?php echo $secondTab . '.php' ?>" ><?php echo $secondTab ?></a></li>
                        <li><a href="<?php echo $thirdTab . '.php' ?>"><?php echo $thirdTab ?></a></li>
                        <li><a href="about.php">About</a></li>

                    </ul>
                </div>
            </div>
        </div>



        <br>  
        <br>
        <br><br>
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
