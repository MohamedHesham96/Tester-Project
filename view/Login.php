<?php
//check if user is already login or not 
session_start();
if (isset($_SESSION['username'])) {
    header("Location: Home.php"); // if yes go to home page
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="../recources/css/bootstrap.min.css">

        <link href="../recources/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../recources/css/form-elements.css">
        <link rel="stylesheet" href="../recources/css/form-style.css">


        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="../recources/images/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../recources/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../recources/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../recources/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../recources/images/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body class="image-container set-full-height" style="background: url('../recources/images/wizard.jpg') no-repeat right " >

        <!-- Top content -->
        <div class="top-content">
            <br>
            <div class="inner-section">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Log in</strong></h1>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">

                                    <h3>Login to our site</h3>
                                    <?php
                                    $massage = "";

                                    if (isset($_GET['errors'])) {
                                        $massage = "There is Problem in your username ot password to log on:";
                                    } else {
                                        $massage = "Enter your username and password to log on:";
                                    }

                                    echo '<p>' . $massage . '</p>';
                                    ?>

                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form action="UserTypeDriver.php" method="POST" >
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Username</label>
                                        <input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                                    </div>
                                    <button type="submit" class="btn">Sign in!</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                            <div class="">
                                <a class="btn-link-2" href="SignUp.php">
                                    Creat New Acount
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <!-- Javascript -->
        <script src="../recources/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="../recources/js/bootstrap.min.js"></script>
        <script src="../recources/js/jquery.backstretch.min.js"></script>
        <script src="../recources/js/scripts.js"></script>


    </body>

</html>