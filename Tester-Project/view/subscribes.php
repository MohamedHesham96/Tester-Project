<html>
    <head>
        <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/style1.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/styletable.css" rel="stylesheet" type="text/css"/>

        <meta charset="utf-8"/>
    </head>
    <body >
        <?php
        session_start();

        $studentName = $_SESSION['username'];
        ?>

        <?php include './header.php'; ?>




        <h1> following </h1>
                <div class="container">

                    <table class="table-striped"> 

                        <tr>
                            <th>Doctor Photo</th>
                            <th>Doctor name</th>
                            <th>Doctor E-Mail</th>
                        </tr>


                        <?php
                        include '../controller/SubscribesOperations.php';
                        $reult = SubscribesOperations::viewAllSubscribes($studentName);

// check if the statment is true

                        if (!$reult) {
                            echo 'error2';
                        } else {
                            while ($row = mysqli_fetch_array($reult, 2)) {
                                echo "<tr>";
                                echo "<td>" . "Photo" . "</td>";
                                echo '<td><a href="profilepage.php?outprofile=true&followstate=true&name=' . $row[1] . '">' . $row[1] . '</a></td>';
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