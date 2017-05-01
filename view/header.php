<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
       include 'login.php';
       die();
    }
?>
<html>

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../recources/images/apple-icon.png">
        <link rel="icon" type="image/png" href="../recources/images/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Quizzer.com</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- CSS Files -->

        <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/style1.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/style3.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/styletable.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <?php
        

        if ($_SESSION['usertype'] == 'doctor') {

            $firstTab = 'doctorhome';
            $secondTab = 'myQuizzes';
            $thirdTab = 'Followers';

            echo '<div class="btn-primary lg"> <button onclick=""><a href="createQuiz.php">Create New Quiz</a></button></div>';
        } else if ($_SESSION['usertype'] == 'student') {

            $secondTab = 'history';
            $thirdTab = 'subscribes';
        } else if ($_SESSION['usertype'] == 'admin') {

            $secondTab = 'doctors';
            $thirdTab = 'students';
        }
        ?>

        <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/style1.css" rel="stylesheet" type="text/css"/><header>


            <div   style="background: #eee" class=" col-lg-12">


                <div class="log btn-danger btn-lg"><a href="?page=logout.php">log out</a></div> 
                <!--to log out-->
                <?php
                    if(isset($_GET['page']))
                    {
                        $page = $_GET['page'];
                        include '../models/'.$page;
                    }
                ?>
              <!--  <select   onchange="location = this.value;" class="log col-xs-2 btn-lg" data-style="btn-warning btn-success">

                    <option value='profilepage.php?name=<?php echo $_SESSION['username']; ?>&followstate="false"&fromheader="true"'>Your profile</option>
                    <option value="login.php">Logout</option>

                </select>
!-->


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


        <div style="background: #eee; height: 55;" class=" col-lg-12">

                <h4 class="log"  style="margin-left: 8;margin-right: 35; margin-top: 20; display: inline; font-size: 14">
                    <a style=" color: #f00;" href="login.php"> <?php echo 'Log out'; ?> </a>
                </h4>
              <h4 class="log" style="margin-right: 0; margin-top: 8; display: inline; font-size: 35">
                    <a style=" color: #aaa;" href="login.php"> <?php echo '|'; ?> </a>
                </h4>
            
            <div style="" class="">



                                <a   href="ProfilePage.php?name=<?php echo $user = $_SESSION['username'] ?>"><?php
                                    include '../include/vars.php';
                                    $conn = new mysqli($host, $username, $password, $dbname);
                                    $connect = mysqli_connect("localhost","root","31560","Testerdb");
                                    $query = "SELECT  *FROM users WHERE username = '$user'";  
                                    $result = mysqli_query($connect, $query);  
                                    $row = mysqli_fetch_array($result) ;

                                     if(empty($row['image']))
                                         echo '<img class="col-lg-push-3" src="../recources/images/default-avatar.png" class="picture-src" hight="50" width="50" id="wizardPicturePreview" title=""/>';
                                     else 
                                     {
                                        echo '<img class="col-lg-push-3" src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="50" width="50" class="img-thumnail" />';
                                     }
                                    ?>
                                </a>
                                                        <a   href="ProfilePage.php?name=<?php echo $_SESSION['username'] ?>">         <?php echo $_SESSION['username'] ?> </a>


                <div style="background: #eee; margin-top: -7 ; margin-right: 3"  class="log">
                    <img  style="border-radius: 60% ; display: inline" src = '../recources/images/default-avatar.png' height = '44'>
                </div>

                <h4 class="log" style="display: inline; margin-right: 5; margin-top: 2; font-size: 20">
                    <a style=" color: #44f;" href="profilepage.php?name=<?php echo $_SESSION['username']  ?>"> <?php echo ucwords($_SESSION['username'])?> </a>
                </h4>

                <form action="searchPage.php" method="GET">

                    <input  style="height: 30; margin-left: 50;font-size: 14" class="col-lg-offset-1 col-lg-3  btn-lg" placeholder="Quiz Name or Code..." class="form-control" name="search" >
                    <input  style="height: 28.5 ; width: 75; font-size: 14; margin-left: -75" class="col-lg-1 btn-success" type="submit" value="Search">

                </form>

            </div>


            <div   class="col-lg-offset-4">
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
