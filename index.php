<?php

session_start();

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

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
            <h4>SIGN UP</h4>
            <p>Don't have an account yet? Sign up here!</p>
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="email" placeholder="E-mail">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwdrepeat" placeholder="Repeat Password">
                <br>
                <button type="submit" name="submit">SIGN UP</button>
            </form>
        </div>
        <div class="index-login-login">
            <h4>LOGIN</h4>
            <p>Don't have an account yet? Sign up here!</p>
            <form action="includes/login.inc.php" method="post">
                .<input type="text" name="email" placeholder="E-mail">
                <input type="password" name="pwd" placeholder="Password">
                .<br>
                <button type="submit" name="submit">LOGIN</button>
            </form>
        </div>
    </div>
</section>

</body>
</html>