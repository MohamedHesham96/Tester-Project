<?php include './Header.php'; ?>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="../recources/css/style1.css" rel="stylesheet" /> 

        <style type="text/css">
            body{
                background: url("../recources/images/back2.jpg") no-repeat  top;
                width: 100%;
                height: 100%;
                    
            }
            .pic{border-radius: 50%;}

        </style>
    </head>
    <body >
        <?php
        $studentName = $_SESSION['username'];
        ?>
        <div style="background-color: rgba(0, 0, 0, 0.37); height:100%;width: 100%; margin-top: -25px ">
        <div class="container">
            <h1><center>following </center></h1>

            <table class="containerr table"> 

                


                <?php
                include '../controller/SubscribesOperations.php';
                $reult = SubscribesOperations::viewAllSubscribes($studentName);

// check if the statment is true

                $trID = 0;

                if (!$reult) {
                    echo 'error2';
                } else {
                        if($reult->num_rows > 0)
                        {   
                            echo '<tr>
                                <th>Doctor Photo</th>
                                <th>Doctor name</th>
                                <th>Doctor E-Mail</th>
                                 </tr>';
                        }  else {
                            die("<h1><center>No result</center></h1>");
                        }
                    while ($row = mysqli_fetch_array($reult)) {
                        $trID++;
                        $profilephoto = $row['image'];
                        echo "<tr style='cursor: pointer' id='$trID'>";
                        if (empty($profilephoto)) {
                            echo '<td><img src="../recources/images/default-avatar.png" class="pic" height="40" width="40" id="wizardPicturePreview" title=""/></td>';
                        } else {
                            echo '<td><img src="data:image/jpeg;base64,' . base64_encode($profilephoto) . '" height="40" width="40" class="pic" class="picture-src" id="wizardPicturePreview"/></td>';
                        }
                        echo '<td>' . $row[1] . '</a></td>';
                        echo "<td>" . $row[2] . "</td>";
                        echo "</tr>";
                        ?>

                        <script>
                            var quizName = <?php echo json_encode($row[1]) ?>;

                            var id = <?php echo json_encode($trID) ?>;
                                        var link = "    ProfilePage.php?outprofile=true&followstate=true&name=" + quizName;

                            $("#" + id).attr('href', link);

                            $("#" + id).on("click", function () {
                                document.location = $(this).attr('href');
                            });
                        </script>


                        <?php
                    }
                }
                ?>

            </table>
        </div>
        <link href="../recources/js/bootstrap.min.js" rel="stylesheet" type="text/javascript"/>
    </body>
</html>