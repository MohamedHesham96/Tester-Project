<?php include './Header.php'; ?>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>
    <body >


        <?php
        include '../controller/AdminOperations.php';

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

        <h1> Docotr List </h1>


        <div class="containerr">
            <form action="Doctors.php" method="GET">
                <input  style="margin-top: 30;height: 50; width: 500;margin-right: 425;  font-size: 22" class="col-lg-10  btn-lg" placeholder="Doctor Name or ID..." class="form-control" name="doctorNameSearch" >
                <input  style="margin-top: 30;height: 49.5 ; width: 75; font-size: 14; margin-left:  -500" class="col-lg-1 btn-success" type="submit" value="Search">

            </form>
        </div>
        <?php
                if (isset($_GET['doctorNameSearch']))
                 {

                      $x=$_GET['doctorNameSearch'];
                      include '../include/vars.php';
                      $conn = mysqli_connect($host, $username, $password, $dbname);
                      if ($conn->error)
                                      die("connection lost");
                      $sql  = "SELECT image,id, username, email, type, birth_day,country, gender, phone, image, university, faculty "
                                      . "FROM `users` where type = 'doctor' AND username='$x'";
                     $result = $conn->query($sql);
                     $editIcon = "<img src = '../recources/images/edit_user.png' height = '32'>";
                     $removeIcon = "<img src = '../recources/images/remove_user.png' height = '32'>";
                     if (!$result)
                         {
                          die($conn->error);
                        }
                     if ($result->num_rows > 0) {

                        echo'<h1>Result</h1>
                            <div class="container">
                             <table class="table-striped">
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
                         while ($row = $result->fetch_assoc()) {

                                   $doctorId = $row["id"];
                                   $doctorname = $row['username'];
                                   $doctoremail = $row['email'];
                                   echo "<tr>";
                                   echo " <td><img style=\"border-radius: 60%\" src = '../recources/images/default-avatar.png' height = '40'></td>";
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

                         echo '</tbody></table>';
                     }
                     else {
                          echo'<br> <div class="alert alert-danger" role="alert">
                              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                              <span class="sr-only">Error:</span>
                              NO RESULT </div>';
                     }
                   }

    else{  echo '<br>
        <div class="container">

            <table class="table-striped">
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



                $result = AdminOperations::getAllDoctors();

                $editIcon = "<img src = '../recources/images/edit_user.png' height = '32'>";

                $removeIcon = "<img src = '../recources/images/remove_user.png' height = '32'>";

                if (!$result) {
                    echo 'error2';
                } else {
                    while ($row = mysqli_fetch_array($result, 1)) {

                        $doctorId = $row["id"];
                        $doctorname = $row['username'];
                        $doctoremail = $row['email'];

                        echo "<tr>";
                        echo " <td><img style=\"border-radius: 60%\" src = '../recources/images/default-avatar.png' height = '40'></td>";

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
                }
              }
                ?>
            </table>
        </div>
        <link href="../recources/js/bootstrap.min.js" rel="stylesheet" type="text/javascript"/>
    </body>
</html>