<?php include './Header.php'; ?>
<html>
    <head>
        <link href="../recources/css/style.css" rel="stylesheet" />

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

        <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <h2 style="display: inline; margin: 0"> Student List</h2>
                        <div id="custom-search-input" style="display: inline-block; float: right; margin:0  -20; ">

                            <form class="input-group col-md-12" style="margin-bottom: 0; " action="students.php" method="GET">

                                <input  type="text" class="form-control input-lg" placeholder="student Name or ID..." class="form-control" name="studentNameSearch" >
                                <span class="input-group-btn">
                                    <button class="btn btn-info btn-lg" type="submit" value="Search">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </span>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
<br>
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
              <table class="containerr table">
                  <thead>
                  <tr>
                      <th>Image</th>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Birth_Day</th>
                      <th>Gender</th>
                      <th>Country</th>
                      <th>Phone</th>
                      <th>University</th>
                      <th>Faculty</th>
                      <th>Edit</th>
                      <th>Delete</th>
                  </tr>
                  </thead>';

                $removeIcon = "<img src = '../recources/images/Remove_User.png' height = '32'>";
                $editIcon = "<img src = '../recources/images/Edit_User.png' height = '32'>";


// check if the statment is true

                if (!$result) {
                    echo 'error2';
                } else {
                    while ($row = mysqli_fetch_array($result, 1)) {

                        $studentName = $row['username'];
                        $profilephoto = $row['image'];
                        echo "<tr>";
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

                        echo "<td class='bt'><a href = 'ProfilePage.php?&name=$studentName'\"> $editIcon </a></td>";
                        echo "<td class='bt'><a href = 'Students.php?&deleteuser=$studentName' onClick=\"javascript:return confirm('are you sure you want to delete this?');\"> $removeIcon  </a></td>";

                        echo "</tr>";
                    }
                }

                ?>

            </table>
        <link href="../recources/js/bootstrap.min.js" rel="stylesheet" type="text/javascript"/>
        <?php include './footer.php';
        ?>
    </body>
</html>
