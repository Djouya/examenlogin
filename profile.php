<?php

session_start();
include "classes/edit-profile.php";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
$user_id = $_SESSION["id"];
$userInfo=new EditProfile();

$test = $userInfo->getProfileById($user_id);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welkom</title>
</head>
<body>
<section class="index-login">
    <div class="wrapper">
        <div class="index-login-signup">
            <h4>Edit Profile</h4>
            <p>Change your information!</p>
            <form action="includes/edit.inc.php" method="POST">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email:</label>
                    <input type="text" value="<?php   echo $test["email"];  ?>" name="email" placeholder="E-mail">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Voornaam:</label>
                    <input type="text" value="<?php   echo $test["voornaam"];  ?>" name="voornaam" class="form-control" id="voornaam" placeholder="Voornaam">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tussenvoegsel:</label>
                    <input type="text" value="<?php   echo $test["tussenvoegsel"];  ?>" name="tussenvoegsel" class="form-control" id="tussenvoegsel" placeholder="Tussenvoegsel">
                </div>
                <div class="mb-3">
                    <label> Achternaam:</label>
                    <input type="text" value="<?php   echo $test["achternaam"];  ?>" id="achternaam" name="achternaam" class="form-control" placeholder="Achternaam">
                </div>
        </div>

        <br>
        <button type="submit" name="submit">Edit</button>
        </form>
    </div>
    </div>
</section>

</body>
</html>