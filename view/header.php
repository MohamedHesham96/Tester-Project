<html>

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../recources/images/apple-icon.png">
        <link rel="icon" type="image/png" href="../recources/images/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Get Shit Done Bootstrap Wizard by Creative Tim</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- CSS Files -->
        <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href= "../recources/css/demo.css" rel="stylesheet" />
    </head>

    <body>
        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SESSION['usertype'] == 'doctor') {
            $secondTab = 'myQuizzes';
            $thirdTab = 'Followers';
            echo '<div class="btn-primary log"> <button onclick=""><a href="createQuiz.php">Create New Quiz</a></button></div>';
        } else if ($_SESSION['usertype'] == 'student') {

            $secondTab = 'History';
            $thirdTab = 'Subscribes';
        } else if ($_SESSION['usertype'] == 'admin') {

            $secondTab = 'Doctors';
            $thirdTab = 'Students';
        }
        ?>

        <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/style1.css" rel="stylesheet" type="text/css"/><header>


            <div   style="background: #eee" class=" col-lg-12">


                <div class="log"> <button  value="login.php" class="btn-danger btn-lg"onclick="location = this.value">log out</button></div> 

              <!--  <select   onchange="location = this.value;" class="log col-xs-2 btn-lg" data-style="btn-warning btn-success">

                    <option value='profilepage.php?name=<?php echo $_SESSION['username']; ?>&followstate="false"&fromheader="true"'>Your profile</option>
                    <option value="login.php">Logout</option>

                </select>
!-->

                <h4>    

                    <div style="background: #eee" class=" col-sm-2 col-lg-push-1">

                        <div class="picture-container">
                            <div class="picture">

                                <img class="col-lg-push-3" src = '../recources/images/default-avatar.png' height = '50'>
                                <a   href="profilepage.php?name=<?php echo $_SESSION['username'] ?>">         <?php echo $_SESSION['username'] ?> </a>


                            </div>          
                        </div>

                    </div>
                </h4> 

                <div  class="col-lg-6">
                    <form action="searchPage.php" method="GET">

                        <input  class="col-lg-10 col-lg-push-3 btn-lg" placeholder="Search..." class="form-control" name="search" >
                        <input  class="col-lg-2 col-lg-push-3 btn-lg btn btn-success" type="submit" value="Search">


                    </form>
                </div>


            </div>

            <br>
            <br><br><br>

            <br>  
            <div style="background: #eee" class=" col-lg-12">

                <div class="nav">

                    <div class="container">
                        <ul>
                            <li ><a href="home.php" class="active" >Home</a></li>
                            <li><a href="<?php echo $secondTab . '.php' ?>" ><?php echo $secondTab ?></a></li>
                            <li><a href="<?php echo $thirdTab . '.php' ?>"><?php echo $thirdTab ?></a></li>
                            <li><a href="about.php">About</a></li>

                        </ul>
                    </div>
                </div>
            </div>
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
