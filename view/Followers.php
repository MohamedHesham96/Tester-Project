<html>
    <head>
        <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/style1.css" rel="stylesheet" type="text/css"/>
        <meta charset="utf-8"/>
    </head>
    <body >


        <?php include './header.php'; ?>

        <h1> Your Followers <h1>
                <div class="container">

                    <table class="table-striped"> 
                        <tr>	
                            <td>Student Name</td>
                        </tr>


                        <?php
                        include '../controller/FollowersOperations.php';
                        $reult = FollowersOperations::getAllFollowers();

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
