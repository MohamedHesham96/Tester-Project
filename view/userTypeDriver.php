<?php

session_start();

$_SESSION['userid'] = "1";
$_SESSION['username'] = "dr.ahmed";
//$_SESSION['usertype'] = "doctor";
$_SESSION['usertype'] = "student";

switch ($_SESSION['usertype']) {

    case "admin":
        header('Location: adminhome.php');
        break;
    case "doctor":
        header("Location: doctorhome.php");
        break;
    case "student":
        header("Location: home.php");
        break;
}
?>