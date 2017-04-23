<html>
    <head>
        <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/style1.css" rel="stylesheet" type="text/css"/>






        <meta charset="utf-8"/>
    </head>
    <body >
        <div class="log"> <button onclick="">log out</button></div>
        <h4> welcome ** </h4>
        <div class="nav">
            <div class="container">
                <ul>
                    <li><a href="home.php" >HOME</a></li>
                    <li><a href="history.php" >History</a></li>
                    <li><a href="subscribes.php" class="active">Subscribes</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>

            </div>
        </div>



        <h1> following <h1>
                <div class="container">

                    <table class="table-striped"> 

                        <tr>
                            <td>Doctor Photo</td>
                            <td>Doctor name</td>
                            <td>Doctor E-Mail</td>
                        </tr>


                        <?php
                        include '../controller/SubscribesOperations.php';
                        $reult = SubscribesOperations::viewAllSubscribes();

// check if the statment is true

                        if (!$reult) {
                            echo 'error2';
                        } else {
                            while ($row = mysqli_fetch_array($reult, 2)) {
                                echo "<tr>";
                                echo "<td>" . $row[0] . "</td>";
                                echo "<td>" . $row[1] . "</td>";
                                echo "<td>" . $row[2] . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>

                    </table>
                </div>
                <link href="../recources/js/bootstrap.min.js" rel="stylesheet" type="text/javascript"/>
                </body>
                </html>