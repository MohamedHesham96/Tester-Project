<html>
    <head>
        <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/style1.css" rel="stylesheet" type="text/css"/>
        <meta charset="utf-8"/>
    </head>
    <body >


        <?php
        session_start();

        $studentName = $_SESSION['username'];
        ?>
        
        <?php include './header.php'; ?>

        <h1> Your Exams <h1>
                <div class="container">

                    <table class="table-striped"> 
                        <tr>	
                            <td>Quiz code</td>
                            <td>Quiz Name</td>
                            <td>Doctor name</td>
                            <td>Mark</td>
                            <td>Time</td>
                            <td>Password</td>
                        </tr>


                        <?php
                        include '../controller/HistoryOperations.php';
                        $result = HistoryOperations::viewAllQuizzes($studentName);

// check if the statment is true

                        if (!$result) {
                            echo 'error2';
                        } else {
                            while ($row = mysqli_fetch_array($result, 1)) {


                                echo "<tr>";
                                echo "<td>" . $row['quiz_id'] . "</td>";
                                echo "<td>" . $row['quiz_name'] . "</td>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "<td>" . $row['mark'] . " / " . $row['full_mark'] . "</td>";
                                echo "<td>" . $row['time'] . "</td>";
                                if ($row['password']) {
                                    echo "<td>" . '<img src=" ../recources/images/lock.png"  height="20" width="20">' . " </td>";
                                } else {
                                    echo "<td>" . '<img src=" ../recources/images/unlock.png"  height="22" width="22">' . " </td>";
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
