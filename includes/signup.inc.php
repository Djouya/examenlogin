<?php
{
if(isset($_POST["submit"]))
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $voornaam = $_POST["voornaam"];
    $tussenvoegsel = $_POST["tussenvoegsel"];
    $achternaam = $_POST["achternaam"];


    // Instantiate SignupContr class
    include "../classes/dhb.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupContr($email, $pwd, $pwdRepeat, $voornaam, $tussenvoegsel, $achternaam);

// Running error handlers and user signup
 $signup->signUser();

// Going to back to front page
    header("location: ../index.php?no-error");
}
?>