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
        <link href="../recources/css/styletable.css" rel="stylesheet" type="text/css"/>
        <style type="text/css">
           
        </style>
    </head>

    <body>
     <?php
        if ($_SESSION['usertype'] == 'doctor') {

            $firstTab = 'DoctorHome';
            $secondTab = 'MyQuizzes';
            $thirdTab = 'Followers';
            $forthTab = 'CreateQuiz';

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

<nav class="navbar navbar-inverse " role="navigation" style="background:rgba(0, 0, 0, 0.62); border: 0; "> 
    <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                
                <a class="navbar-brand" href="#">

                <span style="color: #f5f5f5"> Qu<span class="glyphicon glyphicon glyphicon-hourglass" aria-hidden="true" style="color: rgba(61, 201, 179, 1)"></span>z</span>
                </a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse" style="color: #f5f5f5">
                <ul class="nav navbar-nav">
                    <li class="menu-item "><a href="<?php echo $firstTab ?>.php" >Home</a></li>
                    <ul class="nav navbar-nav">
                        <li class="menu-item"><a href="<?php echo $secondTab . '.php' ?>" ><?php echo $secondTab ?></a></li>
                        <li class="menu-item"><a href="<?php echo $thirdTab . '.php' ?>"><?php echo $thirdTab ?></a></li>
                        <li class="menu-item "><a href="<?php echo $forthTab . '.php' ?>"><?php echo $forthTab ?></a></li>

                        <ul class="nav navbar-nav">

                            <ul class="nav navbar-nav">
                                <li class="menu-item"><a href="About.php">About</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                
                                <li>
                                    <form class="navbar-search navbar-form" method="get" action="">
                                        <input style="background:#f5f5f5 " class="form-control" placeholder="Quiz Name or Code..." name="s" type="text" ">
                                    </form>
                                </li>
                                
                            </ul>
                            <ul class="nav navbar-nav">
                             <li class="menu-item">
                             </li>
                            </ul >
                        </ul>
                    </ul>
                </ul>
                <!-- DROPDOWN LOGIN STARTS HERE  -->
                <ul id="signInDropdown" class="nav navbar-nav navbar-right">
                 <li style="float: right; margin-top: 5px; margin-bottom: 5px">
            
              
                   
                
            
                     <a style=" color: #FFF;display: inline; margin:0;padding: 0" href="ProfilePage.php?name=<?php echo $_SESSION['username']  ?>"> <?php echo ucwords($_SESSION['username'])?> </a>


                
                    <a style="display: inline;margin:0;padding: 0"href="ProfilePage.php?name=<?php echo $_SESSION['username']  ?>">
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
                    
                     <a style=" display: inline;margin:0;padding: 0" href="Header"> <?php echo '|'; ?> </a>
                  

                     <a style=" display: inline;margin:0;padding: 0" href="?page=Logout.php"> Log out </a>
                        <?php
                        if(isset($_GET['page']))
                        {
                            $page = $_GET['page']; 
                            $url  = "../models/".$page;
                            include $url;
                        }   
                    ?>
                   
                    </li>

                    
                </ul> 
       
         <!-- Navigation -->
   
           
                           
        
                </div>
                </div>

     

            


      </nav>     




                
                    

        



        
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