<?php
    session_start();
    if(!isset($_SESSION['username'])){
        
        echo '<script>alert("You must login in to continue :( ");</script>';
        include 'Login.php';
        die();
    }
    include  '../controller/MyProfileOperations.php';

?>
<html>
    <head>
        <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/style1.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/style3.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/styletable.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <?php
        if ($_SESSION['usertype'] == 'doctor') {

            $firstTab = 'DoctorHome';
            $secondTab = 'MyQuizzes';
            $thirdTab = 'Followers';

            //      echo '<div class="btn-primary log"> <button onclick=""><a href="createQuiz.php">Create New Quiz</a></button></div>';
        } else if ($_SESSION['usertype'] == 'student') {

            $firstTab = 'Home';
            $secondTab = 'History';
            $thirdTab = 'Subscribes';
            
        } else if ($_SESSION['usertype'] == 'admin') {

            $firstTab = 'AdminHome';
            $secondTab = 'Doctors';
            $thirdTab = 'Students';
        }
        ?>
        <div style="background: #eee; height: 55;" class=" col-lg-12">

                <h4 class="log"  style="margin-left: 8;margin-right: 35; margin-top: 20; display: inline; font-size: 14">
                    <a style=" color: #f00;" href="?page=Logout.php"> Log out </a>
                    <?php
                        if(isset($_GET['page']))
                        {
                            $page = $_GET['page']; 
                            $url  = "../models/".$page;
                            include $url;
                        }   
                    ?>
                </h4>
              <h4 class="log" style="margin-right: 0; margin-top: 8; display: inline; font-size: 35">
                    <a style=" color: #aaa;" href="Header"> <?php echo '|'; ?> </a>
                </h4>
            
            <div style="" class="">



                <div style="background: #eee; margin-top: -7 ; margin-right: 3"  class="log">
                    <a href="ProfilePage.php?name=<?php echo $_SESSION['username']  ?>">
                        <?php    
                            $user = $_SESSION['username'];
                            $result = MyProfileOperations::getMyData($user);
                            $row = mysqli_fetch_array($result);
                            $profilephoto = $row['image'];
                            if(empty($profilephoto))
                            {
                                echo '<img src="../recources/images/default-avatar.png" class="picture-src" height = "44" width="50"id="wizardPicturePreview" title=""/>';

                            }
                            else
                            {    
                                echo '<img style="border-radius: 60% ; display: inline" src="data:image/jpeg;base64,'.base64_encode($profilephoto).'" height = "44" width="50" class="img-thumnail" class="picture-src" id="wizardPicturePreview"/>'; 
                            }
                        ?>
                    </a>
                </div>

                <h4 class="log" style="display: inline; margin-right: 5; margin-top: 2; font-size: 20">
                    <a style=" color: #44f;" href="ProfilePage.php?name=<?php echo $_SESSION['username']  ?>"> <?php echo ucwords($_SESSION['username'])?> </a>
                </h4>

                <form action="SearchPage.php" method="GET">

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
                            <li><a href="About.php">About</a></li>

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
