    <?php
        class Signup extends Dbh {
            public $resultCheck;

            protected function setUser($emaill, $pwd, $voornaam, $tussenvoegsel, $achternaam) {
                $stmt = $this->connect()->prepare( ' INSERT INTO user (email, wachtwoord, voornaam, tussenvoegsel, achternaam) VALUES (?, ?, ?, ?, ?);');
                $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                if (!$stmt->execute(array($emaill, $hashedPwd, $voornaam, $tussenvoegsel, $achternaam))){
                    $stmt = null;
                    header("location: ../index.php?error=stmtfailed");
                    exit();
                }
               $stmt = null;
            }

            protected function checkUser($emaill) {
            $stmt = $this->connect()->prepare(' SELECT id from user where email = ?;');
            if (!$stmt->execute(array($emaill))){
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }
            
            if($stmt->rowCount() > 0) {
                $resultCheck = false;
            }
            else {
                $resultCheck = true;
            }
            return $resultCheck;
        }

        }