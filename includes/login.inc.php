<?php

//grabbing the data
if(isset($_POST['submit'])){
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
}



//Instantiate signupContr class
include "../classes/dbh.classes.php";
include "../classes/login.classes.php";
include "../classes/login_contrl.classes.php";

$login = new LoginContr($uid, $pwd);

// Running error handlers and user signup
$login->loginUser();

// Going back to front page
header("location: ../index.php?error=LoggedIn");
