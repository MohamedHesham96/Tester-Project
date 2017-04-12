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
                    <li><a href="subscribes.php">Subscribes</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>

            </div>
        </div>


           <div class="container">

            
            <h1 class="has-error"> Results <h1>

                    <table class="table-striped"> 
           
                        <td>Quiz Code</td>
                        <td>Quiz Name</td>
                        <td>Doctor Name</td>
                        <td>Password</td>

                        </tr>

                        <?php
                        include '../controller/SearchOperations.php';
                        $reult = SearchOperations::getSearchResult();

// check if the statment is true

                        if (!$reult) {
                            echo 'error2';
                        } else {
                            while ($row = mysqli_fetch_array($reult, 1)) {

                                echo "<tr>";
                                echo "<td>" . $row['quiz_id'] . "</td>";
                                echo "<td>" . $row['quiz_name'] . "</td>";
                                echo "<td>" . $row['username'] . "</td>";
                               
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