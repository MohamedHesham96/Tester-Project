<?php include './Header.php'; ?>
<html>
    <head>
        <meta charset="utf-8"/>
               <link href="../recources/css/style1.css" rel="stylesheet" />
                 <style type="text/css">
            body{
                background: url("../recources/images/back2.jpg") no-repeat  top;
                width: 100%;
                height: 100%;

            }
            th a{
                display: block;
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 0;
                font-size: 20;
                color: #F5F5F5;

            }

        </style>

    </head>
    <body >




        <div style="background-color: rgba(0, 0, 0, 0.37); height:100%;width: 100%; margin-top: -20px ">
            <br> <br>
                    <?php
                    $userid = $_SESSION['userid'];
                    include '../controller/FollowersOperations.php';
                    $reult = FollowersOperations::getAllFollowers($userid);

// check if the statment is true

                    if (!$reult) {
                        echo 'error2';
                    } else {
                        if($reult->num_rows > 0){

                         echo'
                          <div class="card wizard-card col-sm-6 col-sm-offset-3" data-color="orange" id="wizardProfile" style=" background-color: rgba(245, 245, 245, 0.49); border-radius: 100px;padding-bottom: 30px">
                           <div class="row">
                             <h3><center>Your Followers </center></h3><br>
                              <table class="containerr table" style="width: 80%; margin-left:10%; ">
                                ';
                        }else{ die("<h1><center>NO followes yet</center></h1>"); }
                        while ($row = mysqli_fetch_array($reult, 1)) {

                            echo "<tr>";
                            $profilephoto = $row['image'];

                            if (empty($profilephoto)) {
                               echo '<th style="text-align:right;  "> <img style="border-radius: 20%" src="../recources/images/default-avatar.png" class="picture-src" height = "44" width="50"id="wizardPicturePreview" title=""/></th>';
                            } else {
                                echo '<th style="width:45%; " ><img style="border-radius: 20% ; display: inline" src="data:image/jpeg;base64,' . base64_encode($profilephoto) . '" height = "44" width="50" class="img-thumnail" class="picture-src" id="wizardPicturePreview"/></th>';
                            }
                            echo '<th style=""><a href="ProfilePage.php?&&name=' . $row['username'] . '">' . $row['username'] . '</a></th>';
                            echo "</tr>";
                        }
                    }
                    echo '</table> </div> </div> </div>';
                    ?>

        </div>
        <?php include './footer.php';
        ?>   
                </body>
                </html>
