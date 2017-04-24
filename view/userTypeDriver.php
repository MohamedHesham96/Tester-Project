<?php

session_start();


include '../controller/RegisterOPerations.php';
if (true) {

    $_SESSION['usertype'] = $_GET['type'];
    $_SESSION['username'] = $_GET['username'];
    $user = $_GET['username'];
    $pass = $_GET['password'];
    $email = $_GET['email'];
    $type = $_GET['type'];
    $birthDay = $_GET['birth_day'];
    $country = $_GET['country'];
    //  $gender = $_GET['gender'];
    $gender = 'male';
    $phone = $_GET['phone'];
    //$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $univers = $_GET['university'];
    $faculty = $_GET['faculty'];

     echo $user . "    " . $pass . "    " . $email . "   .     " . $birthDay . "    " . "  .   " . $phone . "   .     " . $univers . "    " . $faculty . "    ". $country ;
    //RegisterOperations::signUp($user, $pass, $email, $type, $birthDay, $country, $gender, $phone, $image, $univers, $faculty);
   RegisterOperations::signUp($user, $pass, $email, $type,  $country, $gender, $phone, $univers, $faculty);

    /* switch ('student') {

      case "admin":
      header('Location: adminhome.php');
      break;
      case "doctor":
      header("Location: submit.php");
      break;
      case "student":
      header("Location: home.php");
      break;
      } */
}/* else {
  $userName = $_GET['username'];
  $password = $_GET['password'];

  echo $userName . "    " . $password;




  $result = RegisterOperations::loginChecker($userName, $password);


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

  // header('Location: login.php?errors=error');
  }
  }
  /* $_SESSION['userid'] = "2";
  $_SESSION['username'] = "dr.hazem";
  $_SESSION['usertype'] = "doctor";
 */

/* $_SESSION['usertype'] = "student";
  $_SESSION['userid'] = "3";
  $_SESSION['username'] = "samir"; */
?>