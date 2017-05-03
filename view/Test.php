<?php
    include '../controller/MyProfileOperations.php';
    $result = MyProfileOperations::getMyData("moussa");
    $row = mysqli_fetch_array($result);
    echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200" class="img-thumnail" />';