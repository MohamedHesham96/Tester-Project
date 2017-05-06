<?php include './Header.php'; ?>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>
    <body >
        <?php
        $studentName = $_SESSION['username'];
        ?>
        <h1> following </h1>
        <div class="">

            <table class="containerr"> 

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
                        echo '<td><a href="ProfilePage.php?outprofile=true&followstate=true&name=' . $row[1] . '">' . $row[1] . '</a></td>';
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