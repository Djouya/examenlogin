<?php
class LoginContr extends Login
{
    private $email;
    private $pwd;
    public $result;


    public function __construct($email, $pwd)
    {
        $this->email = $email;
        $this->pwd = $pwd;

    }

    public function LoginUser()
    {
        if ($this->emptyInput() == false) {
            // echo "Empty input!";
            header("location: ../index.php?error-emptyinput");
            exit();
        }

        $this->getUser($this->email, $this->pwd);
    }

    private function emptyInput()
    {
        
        if (empty($this->email) || empty($this->pwd)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}