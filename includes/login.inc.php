<?php
{
    if(isset($_POST["submit"]))

// grabbing the data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];


    // Instantiate SignupContr class
    include "../classes/dhb.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $signup = new SignupContr($uid, $pwd);

// Running error handlers and user signup
    $login->loginUser();

// Going to back to front page
    header("location: ../index.php?error=none");
}
?>