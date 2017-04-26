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


        <?php
        include './header.php';
        include '../controller/MyProfileOperations.php';
        include '../controller/HistoryOperations.php';
        include '../controller/MyQuizzesOperations.php';
        ?>

        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $followButtonstate = "";


        if (!isset($_GET['name'])) { // get sername from url 
            $username = $_SESSION['username'];
        } else {

            $username = $_GET['name'];
        }

        $color = "";
        $followstate = "";

        if (isset($_GET['followstate'])) {
            if ($_GET['followstate'] == "true") {
                $followstate = "Unfollow";
                $color = "btn-danger";
            } else if ($_GET['followstate'] == "false") {
                $color = "btn-success";
                $followstate = "Follow";
            }
        }


        $result = MyProfileOperations::getMyData($username); // Get all user data to display
        $quizState = ""; // button under the picture
        $quizzesLink = ""; // Title on the button that under the picture 

        if ($row = mysqli_fetch_array($result, 1)) { // Check the type of the user
            if ($row['type'] == 'doctor')
                $quizzesLink = "Available Quizzes : ";
            else if ($row['type'] == 'student')
                $quizzesLink = "History Quizzes : ";
            else if ($row['type'] == 'admin')
                $quizzesLink = "";
            $quizState = "hidden";
            ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">

                        <!--      Wizard container        -->
                        <div class="wizard-container">

                            <div class="card wizard-card " data-color="orange" id="wizardProfile">
                                <br>
                                <div class="row">
                                    <br>    <div style="background: #eee" class=" alert  col-sm-4 col-sm-offset-1">
                                        <div class="picture-container  ">

                                            <?php
                                            if ($_GET['name'] != $_SESSION['username'] && $_SESSION['usertype'] != "doctor" && $row['type'] != "student" && $_SESSION['usertype'] != "admin") {
                                                echo "  <button value=\"../controller/FollowingManager.php?outprofile=false&followname=$username \" onclick=\"location = this.value\" class=\"form-control col-sm-9 $color \"> $followstate </button>";
                                            } else {
                                                
                                            }
                                            ?>
                                            <br>
                                            <br>
                                            <br>
                                            <div class="picture">
                                                <img src="../recources/images/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                            </div>
                                            <h4><?php echo $row['username']; ?></h4>
                                            <h4><u><?php
                                                    if ($row['type'] == 'doctor')
                                                        echo " <a style=\"background: #1D62F0\" class=\" form-control col-sm-9 btn-success\" href= \"myquizzes.php?name=" . $username . " \" >" . $quizzesLink . MyQuizzesOperations::getMyQuizzesCount($username) . "</a></u></h4>";

                                                    if ($row['type'] == 'student')
                                                        echo "<a style=\"background: #1D62F0\"  class=\" form-control col-sm-9 btn-success\"  href= \"history.php?name=" . $username . " \" >" . $quizzesLink . HistoryOperations::getQuizzesCount($username) . "</a>";
                                                    ?></u></h4>
                                        </div>
                                    </div>
                                    <div style="background: #ccc" class="alert col-lg-5 col-sm-offset-1">


                                        <label>Email </label>
                                        <input class="form-control" value="<?php echo $row['email']; ?>" class="form-control" name="email" readonly>
                                        <br>
                                        <label>Gender</label>
                                        <input class="form-control" value="<?php echo $row['gender']; ?>" name="gender" readonly>

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
