<?php

    session_start();
    $user_id = $_SESSION["id"];
    if(isset($_POST["submit"])) {
        $email = $_POST["email"];
        $wachtwoord = $_POST["wachtwoord"];
        $voornaam = $_POST["voornaam"];
        $tussenvoegsel = $_POST["tussenvoegsel"];
        $achternaam = $_POST["achternaam"];


        // Instantiate EditProfile class
        include "../classes/edit-profile.php";
        $editProfile = new EditProfile($email, $wachtwoord, $voornaam, $tussenvoegsel, $achternaam);

        $editProfile->getProfileById($user_id);
        $editProfile->updateProfile($user_id, $email, $wachtwoord, $voornaam, $tussenvoegsel, $achternaam);


// Going to back to front page
        header("location: ../profile.php");
    }
?>