<?php

// this page >> Respons on take the user to the correct page on his type

session_start();

include '../controller/RegisterOPerations.php';

if (isset($_POST['finish'])) {

    $_SESSION['usertype'] = $_POST['type'];
    $_SESSION['username'] = $_POST['username'];

    $user = $_POST['username'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    $type = $_POST['type'];
    $birthDay = $_POST['birth_day'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];

    //  $gender = 'male';
    $phone = $_POST['phone'];
    $file = $_FILES['image']['tmp_name'];
    if(!empty($file))
    {    
        $image = addslashes(file_get_contents());
    }
    else
    {
        $image = NULL;
    }    
    $univers = $_POST['university'];
    $faculty = $_POST['faculty'];
    $resultForUsername = RegisterOperations::usernameChecker($user);
    $resultForEmail = RegisterOperations::emailChecker($email);

    if ($row = mysqli_fetch_array($resultForUsername, 1)) {

        Header('Location: SignUp.php?errors=usernameerror');
    } else if ($row2 = mysqli_fetch_array($resultForEmail, 1)) {

        Header('Location: SignUp.php?errors=emailerror');
    } else {

//        RegisterOperations::signUp($user, $pass, $email, $type, $birthDay, $country, $phone, $image, $univers, $faculty, $gender);
        RegisterOperations::signUp($user, $pass, $email, $type, $birthDay, $country, $phone, $image, $univers, $faculty, $gender);

        $result = RegisterOperations::getSomeData($user);

        if ($row3 = mysqli_fetch_array($result, 1)) {

            $_SESSION['userid'] = $row3['id'];
            $_SESSION['username'] = $row3['username'];
            $_SESSION['usertype'] = $row3['type'];
            $_SESSION['userimage'] = $row3['image'];
        }
          switch ($_POST['type']) {
          case "admin":
          Header('Location: AdminHome.php');
          break;
          case "doctor":
          Header("Location: DoctorHome.php");
          break;
          case "student":
          Header("Location: Home.php");
          break;
          } 
    }
} else {
    $userName = $_POST['username'];
    $password = $_POST['password'];
    $result = RegisterOperations::loginChecker($userName, $password);
    // check if the statment is true
    // check if the username of password is correct

    if ($row = mysqli_fetch_array($result, 1)) { // get some data before login to late use
        $_SESSION['userid'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['usertype'] = $row['type'];
        $_SESSION['userimage'] = $row['image'];

        switch ($_SESSION['usertype']) {

            case "admin":
                Header('Location: AdminHome.php');
                break;
            case "doctor":
                Header("Location: DoctorHome.php");
                break;
            case "student":
                Header("Location: Home.php");
                break;
        }
    } else {

        Header('Location: Login.php?errors=error');
    }
}
?>