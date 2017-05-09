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

        </style>

    </head>
    <body >
        
                <div class="containerr">


                    <?php
                    $userid = $_SESSION['userid'];
                    include '../controller/FollowersOperations.php';
                    $reult = FollowersOperations::getAllFollowers($userid);

// check if the statment is true

                    if (!$reult) {
                        echo 'error2';
                    } else {
                        if($reult->num_rows > 0){
                         
                         echo'<h1> Your Followers </h1><table class="containerr"> 
                                <tr>
                                    <th>Image</th>
                                    <th>Student Name</th>
                                </tr>';
                        }else{ die("<h1><center>NO followes yet</center></h1>"); }
                        while ($row = mysqli_fetch_array($reult, 1)) {

                            echo "<tr>";
                            $profilephoto = $row['image'];
                        
                            if (empty($profilephoto)) {
                                echo '<td><img style="border-radius: 20%" src="../recources/images/default-avatar.png" class="picture-src" height = "44" width="50"id="wizardPicturePreview" title=""/></td>';
                            } else {
                                echo '<td><img style="border-radius: 20% ; display: inline" src="data:image/jpeg;base64,' . base64_encode($profilephoto) . '" height = "44" width="50" class="img-thumnail" class="picture-src" id="wizardPicturePreview"/></td>';
                            }
                            echo '<td><a href="ProfilePage.php?&&name=' . $row['username'] . '">' . $row['username'] . '</a></td>';
                            echo "</tr>";
                        }
                    }
                    echo '</table>';
                    ?>
                   
                </div>
                <link href="../recources/js/bootstrap.min.js" rel="stylesheet" type="text/javascript"/>
                </body>
                </html>
