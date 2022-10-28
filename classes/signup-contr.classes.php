<?php
class SignupContr extends Signup {
    private $pwd;
    private $pwdRepeat;
    private $email;
    private $voornaam;
    private $tussenvoegsel;
    private $achternaam;
    public $result;

    public function __construct ($email, $pwd, $pwdRepeat, $voornaam, $tussenvoegsel, $achternaam ) {
        $this->email = $email;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->voornaam = $voornaam;
        $this->tussenvoegsel = $tussenvoegsel;
        $this->achternaam = $achternaam;

    }
    public function SignUser() {
        if ($this->emptyInput() == false){
        // echo "Empty input!";
            header("location: ../index.php?error-emptyinput");
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
        $this->setUser($this->email, $this->pwd, $this->voornaam, $this->tussenvoegsel, $this->achternaam);
    }

    private function emptyInput() {
        
        if(empty($this->email) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->voornaam || empty($this->tussenvoegsel || empty($this->achternaam )))) {
        $result = false;
        }
        else{
        $result = true;
        }
        return $result;
    }

    private function invaliduid() {
        
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->email))
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
        
        if (!$this->checkUser( $this->email, $this->email))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }
    private function Voornaamcheck() {

        if ($this->voornaam )
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