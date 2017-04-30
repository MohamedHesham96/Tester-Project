<html>

    <head>
        <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/style1.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/style3.css" rel="stylesheet" type="text/css"/>
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

            <div style="" class="">

                <button style="height: 25; width: 75; font-size: 13"  value="login.php" class="btn-danger col-lg-1 log" onclick="location = this.value">log out</button> 

                    <div style="background: #eee; margin-top: -3 ; margin-right: 20"  class="log">
                    <img  style="border-radius: 60% ; display: inline" src = '../recources/images/default-avatar.png' height = '45'>

                </div>


                    
                <h4 class="log" style="display: inline; margin-right: 5;font-size: 21; margin-bottom :10px">
                        <a href="profilepage.php?name=<?php echo $_SESSION['username'] ?>"> <?php echo $_SESSION['username'] ?> </a>
                    </h4>

                
            
                <form action="searchPage.php" method="GET">

                    <input  style="height: 30; margin-left: 50;font-size: 16" class="col-lg-offset-1 col-lg-3  btn-lg" placeholder="Search..." class="form-control" name="search" >
                    <input  style="height: 28.5 ; width: 75; font-size: 14; margin-left: -75" class="col-lg-1 btn-success" type="submit" value="Search">

                </form>
            
            </div>

            
            <div  class="col-lg-offset-4">
                <div  class="nav">
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
