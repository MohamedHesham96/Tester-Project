<?php include './Header.php'; ?>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>
    <body >
        <h1> Your Followers <h1>
                <div class="containerr">


                    <?php
                    $userid = $_SESSION['userid'];
                    include '../controller/FollowersOperations.php';
                    $reult = FollowersOperations::getAllFollowers($userid);

// check if the statment is true

                    if (!$reult) {
                        echo 'error2';
                    } else {
                        echo' <table class="containerr"> 
                                <tr>	
                                    <th>Student Photo</th>
                                    <th>Student Name</th>
                                </tr>';

                        while ($row = mysqli_fetch_array($reult, 1)) {

                            echo "<tr>";
                            echo '<td> PHOTO </td>';
                            echo '<td><a href="ProfilePage.php?&&name=' . $row['student_name'] . '">' . $row['student_name'] . '</a></td>';
                            echo "</tr>";
                        }
                    }
                    echo '</table>';
                    ?>
                </div>
                <link href="../recources/js/bootstrap.min.js" rel="stylesheet" type="text/javascript"/>
                </body>
                </html>
