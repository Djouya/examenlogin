<?php
{
    if(isset($_POST["submit"]))

// grabbing the data
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
   

    // Instantiate SignupContr class
    include "../classes/dhb.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new LoginContr($email, $pwd);

// Running error handlers and user signup
    $login->loginUser();

// Going to back to front page
    header("location: ../index.php?no-error");
}
?>