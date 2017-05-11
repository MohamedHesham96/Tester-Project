<?php include './Header.php';
include '../controller/AdminOperations.php';
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="../recources/css/style.css" rel="stylesheet" />

    </head>
    <body >
        <div class="container" >


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

        <div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <h2 style="display: inline; margin: 0"> Doctor List</h2>
                            <div id="custom-search-input" style="display: inline-block; float: right; margin:0 -20">
                                <form class="input-group col-md-12" style="margin-bottom: 0" action="Doctors.php" method="GET">
                                    <input type="text" class="form-control input-lg" placeholder="Doctor Name or ID..." name="doctorNameSearch" />
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
            </div>
            <br>

        <?php
        $editIcon = "<img src = '../recources/images/Edit_User.png' height = '32'>";
        $removeIcon = "<img src = '../recources/images/Remove_User.png' height = '32'>";
        if (isset($_GET['doctorNameSearch'])) {

            $doctor = $_GET['doctorNameSearch'];
            $result = AdminOperations::searchDoctors($doctor);
        } else {
            $result = AdminOperations::getAllDoctors();
        }
        echo '<br>
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
                    <th>Delete</th>
                </tr>
               </thead>';
        if (!$result) {
            echo 'error2';
        } else {
            while ($row = mysqli_fetch_array($result, 1)) {
                $doctorId = $row["id"];
                $doctorname = $row['username'];
                $doctoremail = $row['email'];
                echo "<tr>";
                $profilephoto = $row['image'];
                if (empty($profilephoto)) {
                    echo '<td  ><img style="border-radius: 20%" src="../recources/images/default-avatar.png" class="picture-src" height = "44" width="50"id="wizardPicturePreview" title=""/></td>';
                } else {
                    echo '<td ><img style="border-radius: 20% ; display: inline" src="data:image/jpeg;base64,' . base64_encode($profilephoto) . '" height = "44" width="50" class="img-thumnail" class="picture-src" id="wizardPicturePreview"/></td>';
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

                echo "<td class='bt'><a href = 'Doctors.php?&deleteuser=$doctorname' onClick=\"javascript:return confirm('are you sure you want to delete this?');\"> $removeIcon  </a></td>";

                echo "</tr>";
            }
            echo "</table></div>";
        }
        ?>
        <?php include './footer.php';
        ?>
    </body>
</html>
