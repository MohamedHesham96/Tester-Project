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
            $studentName = $_GET['name'];
        } else {
            $studentName = $_SESSION['username'];
        }
        ?>

        <?php include './header.php'; ?>

        <h1> Your Exams <h1>
                <div class="container">

                    <table class="table-striped"> 
                        <tr>
                            <td>Image</td>

                            <td>Id</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Birth Day</td>
                            <td>Gender</td>
                            <td>Country</td>
                            <td>Phone</td>
                            <td>University</td>
                            <td>Faculty</td>
                        </tr>


                        <?php
                        include '../controller/AdminOperations.php';
                        $result = AdminOperations::getAllDoctors();


// check if the statment is true

                        if (!$result) {
                            echo 'error2';
                        } else {
                            while ($row = mysqli_fetch_array($result, 1)) {

                                $doctorId = $row["id"];
                                $doctorname = $row['username'];
                                $doctoremail = $row['email'];

                                echo "<tr>";
                                echo " <td><img src = '../recources/images/default-avatar.png' height = '40'></td>";

                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td><a href = 'viewmyresult.php?&name=$doctorname'>" . $row['username'] . "</a></td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['birth_day'] . "</td>";
                                echo "<td>" . $row['gender'] . "</td>";
                                echo "<td>" . $row['country'] . "</td>";
                                echo "<td>" . $row['phone'] . "</td>";
                                echo "<td>" . $row['university'] . "</td>";
                                echo "<td>" . $row['faculty'] . "</td>";

                                echo "</tr>";
                            }
                        }
                        ?>
                    </table>
                </div>
                <link href="../recources/js/bootstrap.min.js" rel="stylesheet" type="text/javascript"/>
                </body>
                </html>
