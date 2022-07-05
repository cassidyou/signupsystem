<?php

//grabbing the data
if(isset($_POST['submit'])){
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdrepeat = $_POST['pwdrepeat'];
    $email = $_POST['email'];
}



//Instantiate signupContr class
include "../classes/dbh.classes.php";
include "../classes/signup.classes.php";
include "../classes/signup_contrl.classes.php";

$signup = new SignupContr($uid, $pwd, $pwdrepeat, $email);

// Running error handlers and user signup
$signup->signupUser();

// Going back to front page
header("location: ../index.php?error=none");