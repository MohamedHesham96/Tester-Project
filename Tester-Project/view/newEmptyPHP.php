<?php
$numbers = range(0, 19);
shuffle($numbers);
foreach ($numbers as $number => $value) {
    echo " $value";
}
?>