<?php include './Header.php'; ?>
<html>
    <head>

        <link href="../recources/css/style1.css" rel="stylesheet" /> 
        <style>
            body {
                background: url("../recources/images/1.jpg") no-repeat right top;
                width: 100%;
                height: 100%;
            }
        </style>

    </head>
    <body >
        <?php
        if (isset($_GET['SearchSub'])) {
            $search = $_GET['Search'];
        } else {
            die('<h3 style="text-align:center;">No search reuslt found</h2>');
        }
        ?>


        <div  style='background: url("../recources/images/search_icon.png") no-repeat left  bottom; height: 93%; width: 100%'>             
            <div class="container">

                <h1> <center>Results </center></h1>

                <table class="container containerr table"> 



                    <?php
                    include '../controller/SearchOperations.php';
                    $reult = SearchOperations::getSearchResult($search);



// check if the statment is true

                    if (!$reult) {
                        echo 'error2';
                    } else {
                        if ($reult->num_rows > 0) {
                            echo ' <tr>
            
                                    <th>Quiz Code</th>
                                    <th>Quiz Name</th>
                                    <th>Doctor Name</th>
                                    <th>Password</th>

                              </tr>';
                            while ($row = mysqli_fetch_array($reult, 1)) {
                                $quizid = $row['quiz_id'];
                                $quizName = $row['quiz_name'];
                                $doctorName = $row['username'];

                                echo '<tr >';
                                if ($_SESSION['usertype'] != "doctor")
                                    echo "<td><a href='Quiz.php?id=$quizid&name=$quizName&maker=$doctorName'>" . $quizid . "</a></td>";
                                else
                                    echo "<td>" . $quizid . "</td>";

                                echo "<td>" . $quizName . "</td>";
                                echo "<td>" . $doctorName . "</td>";

                                if ($row['password']) {
                                    echo "<td>" . '<img src="../recources/images/1.png"  height="27">' . "</td>";
                                } else {
                                    echo "<td>" . '<img src="../recources/images/0.png"  height="27">' . "</td>";
                                }
                                echo "</tr>";
                            }
                        } else {
                            die('<h3 style="text-align:center;">No search reuslt found</h2>');
                        }
                    }
                    ?>

                </table>
            </div>
        </div>
        <link href="../recources/js/bootstrap.min.js" rel="stylesheet" type="text/javascript"/>
    </body>
</html>