<?php
include './Header.php';
include '../controller/HistoryOperations.php';
include '../controller/MyQuizzesOperations.php';
?>
<html>
    <head>

        <!-- CSS Files -->
        <link href="../recources/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />
       <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>       
        <style type="text/css">
           *{
           	box-sizing: border-box;

           }
        	body{
        		background-image: url("../recources/images/back3.jpg")  ;
        		padding-bottom: 0
        	}
        	.bt{
                background-color: rgba(0, 0, 0, 0.6 );
                color:  #f5f5f5;
                margin-bottom: 3px;
            }
            .bt:hover{
                background-color: rgba(0, 0, 0, 0.53);
                
            }

        </style>
    </head>

    <body>


        <?php
        $followButtonstate = "";

        if (!isset($_GET['name'])) { // get sername from url 
            $user = $_SESSION['username'];
        } else {

            $user = $_GET['name'];
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


        $result = MyProfileOperations::getMyData($user); // Get all user data to display
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

              <div class="container-fluid" style="height: 100%; margin-top: -20;" >
                <div class="row">
                    

                           
                            <div class="card wizard-card col-sm-8 col-sm-offset-2" data-color="orange" id="wizardProfile" style="padding-top: 40px; background-color: rgba(245, 245, 245, 0.49);height: 720px">
                                
                                <div class="row">
                                    <br>    <div style="background: rgba(238, 238, 238, 0.81)" class=" alert  col-sm-4 col-sm-offset-1">
                                        <div class="picture-container  ">
                                             
                                            <?php
                                            if ($_GET['name'] != $_SESSION['username'] && $_SESSION['usertype'] != "doctor" && $row['type'] != "student" && $_SESSION['usertype'] != "admin") {
                                                echo "  <button value=\"../controller/FollowingManager.php?outprofile=false&followname=$user \" onclick=\"location = this.value\" class=\"bt form-control col-sm-9 btn-success  \"> $followstate </button>";
                                            } else {
                                                
                                            }
                                            ?>
                                            <div class="picture">
                                                <?php
                                                $profilephoto = $row['image'];
                                                if (empty($profilephoto)) {
                                                    echo '<img src="../recources/images/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>';
                                                } else {
                                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($profilephoto) . '" height="100" width="100" class="img-thumnail" class="picture-src" id="wizardPicturePreview"/>';
                                                }
                                                ?>
                                            </div>

                                            <h4><?php echo ucwords($user) ?></h4>

                                            <h4><u><?php
                                                    if ($row['type'] == 'doctor')
                                                        echo " <a class=\"bt form-control col-sm-9 btn-success\" href= \"MyQuizzes.php?name=" . $user . " \" >" . $quizzesLink . MyQuizzesOperations::getMyQuizzesCount($user) . "</a></u></h4>";

                                                    if ($row['type'] == 'student')
                                                        echo "<a   class=\"bt  form-control col-sm-9 btn-success\"  href= \"History.php?name=" . $user . " \" >" . $quizzesLink . HistoryOperations::getQuizzesCount($user) . "</a>";
                                                    ?></u></h4>
                                        </div>
                                    </div>
                                    <div style="background: rgba(238, 238, 238, 0.81)" class="alert col-lg-5 col-sm-offset-1">

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
<?php } ?>


    </body>

</html>
