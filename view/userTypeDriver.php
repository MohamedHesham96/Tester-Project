<?php

session_start();

$_SESSION['userid'] = "1";
$_SESSION['username'] = "samir";
$_SESSION['usertype'] = "doctor";
/* $_SESSION['usertype'] = "student";
  $_SESSION['userid'] = "3";
  $_SESSION['username'] = "samir";
 */
switch ($_SESSION['usertype']) {

    case "admin":
        header('Location: adminhome.php');
        break;
    case "doctor":
        header("Location: profilepage.php");
        break;
    case "student":
        header("Location: home.php");
        break;
}
?>