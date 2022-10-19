    <?php
        class Signup extends Dbh {

            protected function setUser($uid, $pwd, $email) {
                $stmt = $this->connect()->prepare( ' INSERT INTO users (users_uid, users_pwd,
                users_email) VALUES (?, ?, ?);');
                $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                if (!$stmt->excute(array($uid, $hashedPwd, $email))){
                    $stmt = null;
                    header("location: ../index.php?error=stmtfailed");
                    exit();
                }
               $stmt = null;
            }

            protected function checkUser($uid, $email) {
            $stmt = $this->connect()->prepare(' SELECT users_uid from users where users_uid= ? or users_email = ?;');
            if (!$stmt->excute(array($uid, $email))){
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }
            $resultCheck;
            if($stmt->rowCount() > 0) {
                $resultCheck = false;
            }
            else {
                $resultCheck = true;
            }
            return $resultCheck;
        }

        }