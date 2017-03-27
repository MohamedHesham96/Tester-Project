<?php
    include 'models/Tester.php';
    include 'models/Database.php';
    
    try {
            $DB = new Database('include/vars.php');
        } catch (Exception $exc) 
        {
            echo $exc->getMessage();
        }
    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
