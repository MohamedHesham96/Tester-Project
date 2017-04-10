
<html>
    <head>
        <link href="../cources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/style/style1.css" rel="stylesheet" type="text/css"/>
        <meta charset="utf-8"/>
    </head>
    <body >

        <?
        include './controller/historyOperations.php';
        ?>

        <div class="log"> <button onclick="">log out</button></div>
        <h4> welcome ** </h4>

        <div class="nav">

            <div class="container">

                <ul>
                    <li><a href="home.html" >HOME</a></li>
                    <li><a href="history.html" class="active">History</a></li>
                    <li><a href="subscribes.html">Subscribes</a></li>
                    <li><a href="about.html">About</a></li>

                </ul>
            </div>
        </div>


        <h1> Your Exams <h1>
                <div class="container">
                    <table class="table-striped"> 
                        <tr>	
                            <td>Quiz code</td>
                            <td>Quiz Name</td>
                            <td>Doctor name</td>
                            <td>Password</td>
                            <td>Mark</td>
                        </tr>


                        <?php 
                        $reult = historyOperations::viewAllQuizzes();

                        // check if the statment is true

                        <?php  while ($row = mysqli_fetch_array($reult, 2)) ?>    
                        <tr>
                            <td>  <?php echo 'ame'; ?>  </td>
                        <td>  <?php echo $row[1]; ?>  </td>
                        <td>  <?php echo $row[2]; ?>  </td>
                        <td>  <?php echo $row[3]; ?>  </td>
                        <td>  <?php echo $row[4]; ?>  </td>
                        </tr>
                        <? endwhile?>

                    </table>
                </div>
                <link href="js/bootstrap.min.js" rel="stylesheet" type="text/javascript"/>
                </body>
                </html>

