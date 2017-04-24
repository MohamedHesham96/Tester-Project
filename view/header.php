<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION['usertype'] == 'doctor') {
    $secondTab = 'myQuizzes';
    $thirdTab = 'Followers';
    echo '<div class="btn-primary log"> <button onclick=""><a href="createQuiz.php">Create New Quiz</a></button></div>';
} else if ($_SESSION['usertype'] == 'student') {

    $secondTab = 'History';
    $thirdTab = 'Subscribes';
}
?>

<link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="../recources/css/style1.css" rel="stylesheet" type="text/css"/>


<select   onchange="location = this.value;" class="log selectpicker col-sm-2" data-style="btn-warning btn-success">
   
    <option value=""><?php echo $_SESSION['username']; ?></option>
    <option value="profilepage.php">profile</option>
    <option value="B">My Quizzes </option>
    <option value="-">Other</option>
</select>


<div class="log"> <button onclick="">log out</button></div> <h4> welcome :: <?php echo $_SESSION['username'] ?> </h4>

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
