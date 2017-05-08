<?php include './Header.php'; 
include '../controller/AdminOperations.php';?>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>
    <body >


        <?php

        // to ensure the user is admin only
        // check the name of doctor that we wnat delete it

        if (isset($_SESSION['usertype']) && isset($_GET['deleteuser'])) {
            if ($_SESSION['usertype'] == "admin") {
                $userName = $_GET['deleteuser'];
                echo $userName;
                AdminOperations::deleteUser($userName);
            }
        }
        ?>

        <br>

        <h1> Doctors List </h1>


        <div class="container">
            <form action="Doctors.php" method="GET">
                <input  style="margin-top: 30;height: 50; width: 500;margin-right: 425;  font-size: 22" class="col-lg-10  btn-lg" placeholder="Doctor Name or ID..." class="form-control" name="doctorNameSearch" >
                <input  style="margin-top: 30;height: 49.5 ; width: 75; font-size: 14; margin-left:  -500" class="col-lg-1 btn-success" type="submit" value="Search">

            </form>
        </div>
        <?php
            $editIcon = "<img src = '../recources/images/Edit_User.png' height = '32'>";
            $removeIcon = "<img src = '../recources/images/Remove_User.png' height = '32'>";
                if (isset($_GET['doctorNameSearch']))
                 {

                      $doctor = $_GET['doctorNameSearch'];
                      $result = AdminOperations::searchDoctors($doctor);
                 }

                else
                {  
                      $result = AdminOperations::getAllDoctors();  
                }
             echo '<br>
        <div class="container">

            <table class="containerr">
                <tr>
                    <td>Image</td>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Birth_Day</td>
                    <td>Gender</td>
                    <td>Country</td>
                    <td>Phone</td>
                    <td>University</td>
                    <td>Faculty</td>
                </tr>';
                if (!$result) 
                {
                    echo 'error2';
                } else {
                    while ($row = mysqli_fetch_array($result, 1)) {
                        $doctorId = $row["id"];
                                   $doctorname = $row['username'];
                                   $doctoremail = $row['email'];
                                   echo "<tr>";
                                   $profilephoto = $row['image'];
                                    if (empty($profilephoto)) {
                                    echo '<td><img style="border-radius: 20%" src="../recources/images/default-avatar.png" class="picture-src" height = "44" width="50"id="wizardPicturePreview" title=""/></td>';
                                     } else {
                                    echo '<td><img style="border-radius: 20% ; display: inline" src="data:image/jpeg;base64,' . base64_encode($profilephoto) . '" height = "44" width="50" class="img-thumnail" class="picture-src" id="wizardPicturePreview"/></td>';
                                     }
              
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['birth_day'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";
                        echo "<td>" . $row['country'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['university'] . "</td>";
                        echo "<td>" . $row['faculty'] . "</td>";

                        echo "<td><a href = 'profilepage.php?&name=$doctorname'>" . $editIcon . "</a></td>";
                        echo "<td><a href = 'Doctors.php?&deleteuser=$doctorname' onClick=\"javascript:return confirm('are you sure you want to delete this?');\"> $removeIcon  </a></td><tr>";

                        echo "</tr>";
                    }
                echo "</table></div>";
              }
        ?>
        <link href="../recources/js/bootstrap.min.js" rel="stylesheet" type="text/javascript"/>
    </body>
</html>