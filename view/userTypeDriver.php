<?php

session_start();


include '../controller/LoginOPerations.php';

$userName = $_GET['username'];
$password = $_GET['password'];

echo $userName . "    " . $password;

$result = LoginOperations::loginChecker($userName, $password);


// check if the statment is true

if ($row = mysqli_fetch_array($result, 1)) {

    $_SESSION['userid'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['usertype'] = $row['type'];
    $_SESSION['userimage'] = $row['image'];

    switch ($_SESSION['usertype']) {

        case "admin":
            header('Location: adminhome.php');
            break;
        case "doctor":
            header("Location: submit.php");
            break;
        case "student":
            header("Location: home.php");
            break;
    }
} else {

   // header('Location: login.php');
}

/* $_SESSION['userid'] = "2";
  $_SESSION['username'] = "dr.hazem";
  $_SESSION['usertype'] = "doctor";
 */

/* $_SESSION['usertype'] = "student";
  $_SESSION['userid'] = "3";
  $_SESSION['username'] = "samir"; */
?>