<?php
include './Header.php';
include '../controller/StudentHomeOperations.php';
?>
<html>
    <head>
        <meta charset="utf-8"/>

    </head>
    <body>
        <br>
        <br>
        <br>

        <?php
        //connect to data base and create table for result
        $studentName = $_SESSION['username'];
        $result = HomeStudnetOperations::getAllAvailableQuizzes($studentName);

        //display result in table
        echo '<div class="container">';
        echo '<table class="containerr">'
        . '<tr><th>Test Name</th>'
        . '<th>Test Code</th>'
        . '<th>Marker name</th>'
        . '<th>Secure</th>'
        . '</tr>';
     
        $trID = 0; // for TR Tags >>> Href By This

        while ($row = mysqli_fetch_assoc($result)) {
            $trID++;

            $id = $row['quiz_id'];
            $name = $row['quiz_name'];
            $password = $row['password'];
            $maker = $row['username'];
            $makerId = $row['id'];
            $fullMark = $row['full_mark'];

            if ($_SESSION['usertype'] != "doctor") {

                echo '<tr id=' . $trID . '>'
                . '<td>' . $name . '</a></td>'
                . '<td>' . $id . '</td><td>' . $maker . '</td>';
            } else {

                echo '<tr>'
                . '<td>' . $name . '</td>'
                . '<td>' . $id . '</td><td>' . $maker . '</td>';
            }

            if (empty($password)) {
                echo '<td><img src=" ../recources/images/1.png" style="max-width:27px;"></td>';
            } else {
                echo '<td><img src=" ../recources/images/0.png" style="max-width:27px"></td>';
            }
            echo '</tr>';
            ?>

            <script>


                var quiz_id = <?php echo json_encode($row['quiz_id']); ?>;
                var quizName = <?php echo json_encode($row['quiz_name']) ?>;
                var quizMaker = <?php echo json_encode($row['username']) ?>;
                var makerID = <?php echo json_encode($row['id']) ?>;
                var fullMark = <?php echo json_encode($row['full_mark']) ?>;

                var password = <?php echo json_encode($row['password']) ?>;

                var id = <?php echo json_encode($trID) ?>;


                var link = "Quiz.php?id=" + quiz_id + "&maker=" + quizMaker + "&name=" + quizName + "&fullmark=" + fullMark + "&makerid=" + makerID;
                //alert(link);


                $("#" + id).attr('href', link);
                $("#" + id).attr('value', password);

                $("#" + id).on("click", function () {

                    quizpass = $(this).attr('value');

                    if (quizpass) {

                        userpass = prompt("Pleas Enter The Password To Enter This Quiz !");
                        if (!userpass) {

                        } else if (userpass == quizpass) {
                            document.location = $(this).attr('href');
                        } else {
                            alert("Password Is Wrong... Please Try Agine :(");
                        }
                    } else {
                        document.location = $(this).attr('href');

                    }

                });
            </script>


            <?php
        }

        echo '</table>';
        echo '</div>';
        ?>
    </body>
</html>