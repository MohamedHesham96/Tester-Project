<?php
echo '    <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>'
 . '  <link href="../recources/css/style1.css" rel="stylesheet" type="text/css"/>';

echo '<div class="log"> <button onclick="">log out</button></div> <h4> welcome ** </h4>';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION['usertype'] == 'doctor') {
    $secondTab = 'myQuizzes';
    $thirdTab = 'Followers';
} else if ($_SESSION['usertype'] == 'student') {
 
    $secondTab = 'History';
    $thirdTab = 'Subscribes';
}
?>

<div class="nav">

    <div class="container">
        <ul>
            <li><a href="home.php" class="active" >HOME</a></li>
            <li><a href="<?php echo $secondTab . '.php' ?>" ><?php echo $secondTab ?></a></li>
            <li><a href="<?php echo $thirdTab . '.php' ?>"><?php echo $thirdTab ?></a></li>
            <li><a href="about.php">About</a></li>

        </ul>
    </div>
</div>
