


<html>
    <head>
        <link href="../cources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/style/style1.css" rel="stylesheet" type="text/css"/>
        <meta charset="utf-8"/>
    </head>
    <body >
        <div class="log"> <button onclick="">log out</button></div>
        <h4> welcome ** </h4>

        <div class="nav">

            <div class="container">

                <ul>
                    <li><a href="home.html" >HOME</a></li>
                    <li><a href="history.html" class="active">History</a></li>
                    <li><a href="subscribes.html">Subscribes</a></li>
                    <li><a href="about.html">About</a></li>

                </ul>
            </div>
        </div>



        <h1> Your Exams <h1>
                <div class="container">

                    <table class="table-striped"> 
                        <tr>	
                            <td>Quiz code</td>
                            <td>Quiz Name</td>
                            <td>Doctor name</td>
                            <td>Password</td>
                            <td>Mark</td>
                        </tr>


                        <?php

                        include './historyOperations.php';
                        $reult = historyOperations::viewAllQuizzes();

// check if the statment is true

                        if (!$reult) {
                            echo 'error2';
                        } else {
                            while ($row = mysqli_fetch_array($reult, 2)) {
                                echo "<tr>";
                                echo "<td>" . $row[0] . "</td>";
                                echo "<td>" . $row[1] . "</td>";
                                echo "<td>" . $row[2] . "</td>";
                                echo "<td>" . $row[3] . "</td>";
                                echo "<td>" . $row[4] . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </table>
                </div>
                <link href="js/bootstrap.min.js" rel="stylesheet" type="text/javascript"/>
                </body>
                </html>
