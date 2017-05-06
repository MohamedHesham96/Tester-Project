<?php include './Header.php'; ?>
<html>
    <head>
  
        <meta charset="utf-8"/>
    </head>
    <body >
        <?php
            if(isset($_GET['SearchSub']))
            {    
                $search = $_GET['Search'];
            } 
            else 
            {
                die('<h3 style="text-align:center;">No search reuslt found</h2>');
            }
        ?>

        <div class="container">


            <h1> Results </h1>

            <table class="containerr"> 
                


                <?php
                include '../controller/SearchOperations.php';
                $reult = SearchOperations::getSearchResult($search);



                // check if the statment is true

                if (!$reult) {
                    echo 'error2';
                } else {
                        if( $reult->num_rows > 0)
                        {    
                        echo  '  <tr>
                                    <td>Quiz Code</td>
                                    <td>Quiz Name</td>
                                    <td>Doctor Name</td>
                                    <td>Password</td>

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
                                echo "<td>" . '<img src="../recources/images/1.png"  height="20" width="20">' . "</td>";
                            } else {
                                echo "<td>" . '<img src="../recources/images/0.png"  height="22" width="22">' . "</td>";
                            }
                            echo "</tr>";
                            }
                        }
                        else {
                            die('<h3 style="text-align:center;">No search reuslt found</h2>');
                        }
                }
                ?>

            </table>
        </div>
        <link href="../recources/js/bootstrap.min.js" rel="stylesheet" type="text/javascript"/>
    </body>
</html>