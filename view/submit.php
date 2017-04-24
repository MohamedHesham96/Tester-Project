<html>
    <head>
        <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/style1.css" rel="stylesheet" type="text/css"/>

        <meta charset="utf-8"/>
    </head>
    <body >
        
      <?php include './header.php'; ?>


        <div>
            <h1> My Quizzes <h1>
                    <?php
                    //connect to data base and create table for result
                    include '../include/vars.php';
                    $conn = mysqli_connect($host, $username, $password, $dbname);
                    if ($conn->error)
                        die("connection lost");
                    $sql = "SELECT users.username, submits.mark, submits.time, quizzes.full_mark from submits "
                            . "JOIN users on users.id = submits.student_id "
                            . "JOIN quizzes on quizzes.quiz_id = submits.quiz_id where submits.quiz_id = '1001'";
                    $result = $conn->query($sql);
                    if (!$result)
                        die($conn->error);
                    if ($result->num_rows > 0) {
                        echo '<style>table{width:100%;border-collapse:collapse;} td,th{height:50px; text-align:left;border-bottom:1px #ddd solid ;padding:15px;}th{background-color:#4CAF50 ;color:white; } tr:hover {background-color: #4CAF50; color:white;} tr:nth-child(even){background-color:#f2f2f2;}tr:nth-child(even):hover{background-color:#4CAF50;} </style>';
                        echo '<table><thead><tr><th>Student Name<th>Student Mark</th><th>Submit Time</th></tr><thead><tbody>';
           
                        while ($row = $result->fetch_assoc()) {
                            $name = $row['username'];
                            $mark = $row['mark'];
                            $fullMark = $row['full_mark'];
                            $time = $row['time'];
                            echo '<tr><td>' . $name . '</td><td>' . $mark . ' / ' . $fullMark . '</td><td>' . $time . '</td>';
                            echo '</tr>';
                        }
                        
                        echo '</tbody></table>';
                    }
                    ?>

                    <link href="js/bootstrap.min.js" rel="stylesheet" type="text/javascript"/>
                    </body>
                    </html>
