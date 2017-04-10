<html>
    <head>

        <link href="../cources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/style/style1.css" rel="stylesheet" type="text/css"/>


        <meta charset="utf-8"/>
    </head>
    <body >
        <div class="log"> <button onclick="">log out</button></div>
        <h4> welcome ** </h4>


        <div class="nav">

            <div class="container">
                <ul>
                    <li><a href="home.php" class="active" >HOME</a></li>
                    <li><a href="history.php" >History</a></li>
                    <li><a href="subscribes.php">Subscribes</a></li>
                    <li><a href="about.php">About</a></li>

                </ul>
            </div>
        </div>


        <h1></h1>
        <br>
        <br>
        <br>
        <div class="container">
        <?php 
            //connect to data base and create table for result
                include 'include/vars.php';
                $conn = mysqli_connect($host, $username, $password, $dbname);
                if($conn->error)
                    die("connection lost");
                $sql = "SELECT quizzes.quiz_id, quizzes.quiz_name, users.username, quizzes.password from quizzes JOIN users on users.id = quizzes.doctor_id";
                $result = $conn->query($sql);
                if(!$result)
                    die ($conn->error);
                //display result in table
                if ($result->num_rows > 0)
                {
                 echo '<style>table{width:100%;border-collapse:collapse;} td,th{height:50px; text-align:left;border-bottom:1px #ddd solid ;padding:15px;}th{background-color:#4CAF50 ;color:white; } tr:hover {background-color: #4CAF50; color:white;} tr:nth-child(even){background-color:#f2f2f2;}tr:nth-child(even):hover{background-color:#4CAF50;} </style>' ;   
                  echo '<table><thead><tr><th>Test Name<th>Test Code</th><th>Marker name</th><th>Secure</th></tr><thead><tbody>';
                    while($row = $result->fetch_assoc()) 
                        {
                            $id       = $row['quiz_id'];
                            $name     = $row['quiz_name'];
                            $password = $row['password'];
                            $maker   = $row['username'];    
                          echo '<tr><td>'.$name.'</td><td>'.$id.'</td><td>'.$maker.'</td>';  
                          if(empty($password)){
                              echo '<td><img src="recources/images/unlock.png" style="max-width:20px; max-hight:20px;"></td>' ;
                          }
                          else {
                              echo '<td><img src="recources/images/lock.png " style="max-width:20px;max-hight:20px;"></td>' ;
                          }
                          echo '</tr>';
                        }
                  echo '</tbody></table>';
                }
        ?>
        </div>
        <link href="js/bootstrap.min.js" rel="stylesheet" type="text/javascript"/>
    </body>
</html>