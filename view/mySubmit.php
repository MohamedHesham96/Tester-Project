<?php include './header.php';?>
<html>
    <head>
        <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/style1.css" rel="stylesheet" type="text/css"/>
        <meta charset="utf-8"/>
    </head>
    <body >
        <?php
        for ($i = 0; $i <= 10; $i++) {

            if (isset($_GET['correct_ans' . $i])) {

                if ($_GET['correct_ans' . $i] == $_GET[$i]) {

                    echo "yes Ture : " . "   " . $_GET['correct_ans' . $i] . "  =  " . $_GET[$i] . "<Br>";
                } else if ($_GET['correct_ans' . $i] != $_GET[$i]) {

                    echo "No False : " . "   " . $_GET['correct_ans' . $i] . "  ///  " . $_GET[$i] . "<Br>";
                }
            }
        }
        ?>  

        <h1> Your Result </h1>
                <div class="container">

                    <table class="table-striped"> 
                        <tr>	
                            <td>Question Header</td>
                            <td>Correct Answer</td>
                            <td>Your Answer</td>
                        </tr>

<?php
for ($i = 0; $i <= 30; $i++) {

    if (isset($_GET['correct_ans' . $i]) && isset($_GET[$i])) {

        if ($_GET['correct_ans' . $i] == $_GET[$i]) {

            echo "<tr style='background: #00ff00'>";
        } else if (($_GET['correct_ans' . $i] != $_GET[$i]) || !isset($_GET[$i])) {

            echo "<tr style='background: #ff0033'>";
        }

        echo "<td>" . "Header" . "</td>";
        echo "<td>" . $_GET['correct_ans' . $i] . "</td>";
        echo "<td>" . $_GET[$i] . "</td>";

        echo "</tr>";
    }
}
?>
                    </table>
                </div>
                <link href="../recources/js/bootstrap.min.js" rel="stylesheet" type="text/javascript"/>
                </body>
                </html>
