<?php include './Header.php'; ?>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>
    <body >
  <h1> Your Followers <h1>
                <div class="container">

                    <table class="table-striped"> 
                        <tr>	
                            <th>Student Name</th>
                        </tr>


                        <?php
                        $userid = $_SESSION['userid'];
                        include '../controller/FollowersOperations.php';
                        $reult = FollowersOperations::getAllFollowers($userid);

// check if the statment is true

                        if (!$reult) {
                            echo 'error2';
                        } else {
                            
                            while ($row = mysqli_fetch_array($reult, 1)) {
                                echo "<tr>";
                                echo '<td><a href="profilepage.php?&&name=' . $row['student_name'] . '">' . $row['student_name'] . '</a></td>';
                                echo "</tr>";
                            }
                        }
                        ?>
                    </table>
                </div>
                <link href="../recources/js/bootstrap.min.js" rel="stylesheet" type="text/javascript"/>
                </body>
                </html>
