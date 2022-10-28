<?php

class Login extends Dbh
{

    protected function getUser( $email, $pwd) {
        $stmt = $this->connect()->prepare('SELECT wachtwoord FROM user WHERE email = ?;');

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        if($stmt->rowCount() == 0)
        {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }
        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]["wachtwoord"]);
        if($checkPwd == false)
        {
            $stmt = null;
            header("location: ../index.php?error-wrongpassword");
            exit();
        }
        elseif($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM user WHERE email = ?
            OR email = ? AND wachtwoord = ?;');

            if (!$stmt->execute(array($email, $email ,$pwd))) {
                $stmt = null;
                header("location: ../index.php?stmtfailed");
                exit();
            }
        }

        if($stmt->rowCount() == 0)
        {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        session_start();
        $_SESSION ["id"] = $user[0]["id"];
        
        //$_SESSION ["id "] = $user[0]["id"];
        $stmt = null;    }



}
?>
