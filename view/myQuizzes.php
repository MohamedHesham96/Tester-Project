<html>
    <head>
        <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/style1.css" rel="stylesheet" type="text/css"/>


        <meta charset="utf-8"/>
    </head>
    <body >

        <?php
        session_start();
        if (isset($_GET['name'])) {

            $doctorName = $_GET['name'];
        } else {

            $doctorName = $_SESSION['username'];
        }
        ?>


<?php include './header.php'; ?>



        <div class="container">


            <h1> My Quizzes <h1>

                    <table class="table-striped"> 

                        <td>Quiz Code</td>
                        <td>Quiz Name</td>
                        <td>Full Mark</td>
                        <td>Quiz Date</td>
                        <td>Password</td>

                        </tr>

<?php
include '../controller/MyQuizzesOperations.php';
$reult = MyQuizzesOperations::getMyQuizzes($doctorName);


// check if the statment is true

if (!$reult) {
    echo 'error2';
} else {
    while ($row = mysqli_fetch_array($reult, 1)) {

        echo "<tr>";
        echo "<td>" . $row['quiz_id'] . "</td>";
        echo "<td>" . $row['quiz_name'] . "</td>";
        echo "<td>" . $row['full_mark'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";

        if ($row['password']) {
            echo "<td>" . $row['password'] . "</td>";
        } else {
            echo "<td>" . 'No Password' . "</td>";
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