<?php
class SignupContr extends Signup {
    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;


    public function __construct ($uid, $pwd, $pwdRepeat, $email ) {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }
    public function SignUser() {
        if ($this->emptyInput() == false){
        // echo "Empty input!";
            header("location: ../index.php?error-emptyinput");
            exit();
        }
        if ($this->invaliduid() == false){
            // echo "Invalid Username!";
            header("location: ../index.php?error-username");
            exit();
        }
        if ($this->invalideEmail() == false){
            // echo "Invalid Email!";
            header("location: ../index.php?error-email");
            exit();
        }
        if ($this->pwdMatch() == false){
            // echo "Password dont match!";
            header("location: ../index.php?error-passwordmatch");
            exit();
        }
        if ($this->uidtakencheck() == false){
            // echo "Username or Email taken!";
            header("location: ../index.php?error-userortakenemail");
            exit();
        }
        $this->setUser($this->uid, $this->pwd, $this->email);
    }

    private function emptyInput() {
        $result;
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)) {
        $result = false;
        }
        else{
        $result = true;
        }
        return $result;
    }

    private function invaliduid() {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    private function invalideEmail() {
        $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
        $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }
    private function pwdMatch() {
        $result;
        if ($this->pwd !== $this->pwdRepeat)
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }
    private function uidTakenCheck() {
        $result;
        if (!$this->checkUser( $this->uid, $this->email))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

}

?>