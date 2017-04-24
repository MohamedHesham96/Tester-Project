<!doctype html>
<html lang="en">
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
        <?php include './header.php'; ?>

        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_GET['name'])) {

            $username = $_SESSION['username'];
        } else {
            
            $username = $_GET['name'];
        }

        include '../controller/MyProfileOperations.php';

        $result = MyProfileOperations::getMyData($username);
        while ($row = mysqli_fetch_array($result, 1)) {
            ?>

            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">

                        <!--      Wizard container        -->
                        <div class="wizard-container">

                            <div class="card wizard-card" data-color="orange" id="wizardProfile">

                                <div class="row">
                                    <br>    <div class="col-sm-4 col-sm-offset-1">
                                        <div class="picture-container">

                                            <br>
                                            <div class="picture">
                                                <img src="../recources/images/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                            </div>
                                            <h6><?php echo $row['username']; ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">


                                        <label>Email </label>
                                        <input class="form-control" value="<?php echo $row['email']; ?>" class="form-control" name="email" readonly>


                                        <br>
                                        <label>Birth Day</label>
                                        <input class="form-control" value="<?php echo $row['birth_day']; ?>" type="text" name="birth_day" readonly>
                                        <br>
                                        <label>Phone </label>
                                        <input class="form-control" value="<?php echo $row['phone']; ?>" name="phone" readonly>
                                        <br>

                                        <label>University </label>
                                        <input class="form-control" value="<?php echo $row['university']; ?>" name="university" readonly>
                                        <br>

                                        <label>Faculty </label>
                                        <input class="form-control" value="<?php echo $row['faculty']; ?>" name="faculty" readonly>
                                        <br>
                                        <label>Country</label>
                                        <input class="form-control" value="<?php echo $row['country']; ?>" name="country" readonly>
                                        <br>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>


            <?php } ?>

        </div>

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
