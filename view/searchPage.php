<?php include './header.php';?>
<html>
    <head>
        <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/style1.css" rel="stylesheet" type="text/css"/>

        <meta charset="utf-8"/>
    </head>
    <body >

        <?php $search = $_GET['search'] ?>

        <div class="container">


            <h1> Results </h1>

            <table class="table-striped"> 
                <tr>                        <td>Quiz Code</td>
                    <td>Quiz Name</td>
                    <td>Doctor Name</td>
                    <td>Password</td>

                </tr>


                <?php
                include '../controller/SearchOperations.php';
                $reult = SearchOperations::getSearchResult($search);



// check if the statment is true

                if (!$reult) {
                    echo 'error2';
                } else {
                    while ($row = mysqli_fetch_array($reult, 1)) {
                      
                        $quizid = $row['quiz_id'];
                        $quizName = $row['quiz_name'];
                        $doctorName = $row['username'];

                        echo '<tr >';
                        if ($_SESSION['usertype'] != "doctor")
                            echo "<td><a href='quiz.php?id=$quizid&name=$quizName&maker=$doctorName'>" . $quizid . "</a></td>";
                        else
                            echo "<td>" . $quizid . "</td>";

                        echo "<td>" . $quizName . "</td>";
                        echo "<td>" . $doctorName . "</td>";

                        if ($row['password']) {
                            echo "<td>" . '<img src="../recources/images/lock.png"  height="20" width="20">' . "</td>";
                        } else {
                            echo "<td>" . '<img src="../recources/images/unlock.png"  height="22" width="22">' . "</td>";
                        }
                        echo "</tr>";
                    }
                }
                ?>

            </table>
        </div>
        <link href="../recources/js/bootstrap.min.js" rel="stylesheet" type="text/javascript"/>
    </body>
</html>