<?php include './Header.php'; ?>
<html>
    <head>
    </head>
    <body >


        <?php
        include '../controller/AdminOperations.php';

        // to ensure the user is admin only
        // check the name of doctor that we wnat delete it

        if (isset($_SESSION['usertype']) && isset($_GET['deleteuser'])) {
            $userName = $_GET['deleteuser'];
            AdminOperations::deleteUser($userName);
        }
        ?>

        <br>
        <h1> Studnets List  </h1>

                <div class="containerr">
                    <form action="students.php" method="GET">
                        <input  style="margin-top: 30;height: 50; width: 500;margin-right: 425;  font-size: 22" class="col-lg-10  btn-lg" placeholder="student Name or ID..." class="form-control" name="studentNameSearch" >
                        <input  style="margin-top: 30;height: 49.5 ; width: 75; font-size: 14; margin-left:  -500" class="col-lg-1 btn-success" type="submit" value="Search">
                    </form>
                </div>




                <?php
                  if (isset($_GET['studentNameSearch']))
                 {
                    $studentname=$_GET['studentNameSearch'];
                    $result=AdminOperations::searchStudents($studentname);
                    if($result->num_rows < 1)
                    {

                      echo'<br> <div class="alert alert-danger" role="alert">
                          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                          <span class="sr-only">Error:</span>
                          NO RESULT </div>';die;
                    }

                  }
              else{
                      $result = AdminOperations::getAllStudents();
                  }



  echo'
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

                $removeIcon = "<img src = '../recources/images/Remove_User.png' height = '32'>";
                $editIcon = "<img src = '../recources/images/Edit_User.png' height = '32'>";


// check if the statment is true

                if (!$result) {
                    echo 'error2';
                } else {
                    while ($row = mysqli_fetch_array($result, 1)) {

                        $studentName = $row['username'];

                        echo "<tr>";
                        echo " <td><img style=\"border-radius: 30%\" src = '../recources/images/default-avatar.png' height = '40'></td>";

                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['birth_day'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";
                        echo "<td>" . $row['country'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['university'] . "</td>";
                        echo "<td>" . $row['faculty'] . "</td>";

                        echo "<td><a href = 'profilepage.php?&name=$studentName'\"> $editIcon </a></td>";
                        echo "<td><a href = 'students.php?&deleteuser=$studentName' onClick=\"javascript:return confirm('are you sure you want to delete this?');\"> $removeIcon  </a></td>";

                        echo "</tr>";
                    }
                }

                ?>
            </table>
        </div>
        <link href="../recources/js/bootstrap.min.js" rel="stylesheet" type="text/javascript"/>
    </body>
</html>