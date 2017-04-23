<!--make information displayed in center of page -->
<div id="Quiz-details" style="text-align: center">
    <?php
    //get information from prevoius page which clicked by the user
    $name = $_GET['name'];
    $id = $_GET['id'];
    $maker = $_GET['maker'];
    echo "Quiz id    : $id <br><br>"; //display quiz id
    echo "Quiz name  : $name <br><br>"; //display quiz name
    echo "Quiz maker : <a href='#'>$maker</a><br><br>"; //may be go to doctor profile
    ?>
</div>

