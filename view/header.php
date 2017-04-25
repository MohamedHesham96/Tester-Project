<header>
  
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
<link href="../recources/css/style1.css" rel="stylesheet" type="text/css"/><header>
  
<br>
  
<div class="log"> <button  value="login.php" class="btn-danger"onclick="location = this.value">log out</button></div> 

<select   onchange="location = this.value;" class="log selectpicker col-lg-pull-8" data-style="btn-warning btn-success">


    <option value='profilepage.php?name=<?php echo $_SESSION['username']; ?>&followstate="false"&fromheader="true"'>Your profile</option>
    <option value="login.php">Logout</option>

</select>


<h4> welcome :: <?php echo $_SESSION['username'] ?> </h4> 

<div  style="left: 30%" class="col-lg-4">
    <form action="searchPage.php" method="GET">

        <input  class="form-control" placeholder="Search..." class="form-control" name="search" >
        <input class="btm" type="submit" value="Search">

    </form>
</div>

<br>
<br><br><br>
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
</header>