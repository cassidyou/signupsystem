<?php


class SignupContr extends Signup{
    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    public function __construct($uid, $pwd, $pwdRepeat, $email){
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }
   
    //Signup user
    public function signupUser(){
        //if any input is empty
        if($this->emptyInput() == false){
            //echo "Empty input!" 
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        // if the username is not a valid username
        if($this->invalidUid() == false){
            //echo "Invalid username!" 
            header("location: ../index.php?error=username");
            exit();
        }

        // if the email is not a valid email
        if($this->invalidEmail() == false){
            //echo "Invalid email!" 
            header("location: ../index.php?error=email");
            exit();
        }

        // if password and passwordrepeat mismatch
        if($this->pwdMatch() == false){
            //echo "Password Mismatch!" 
            header("location: ../index.php?error=passwordMatch");
            exit();
        }

        // if username and password already exist
        if($this->userExists() == false){
            //echo "Password Mismatch!" 
            header("location: ../index.php?error=userExists");
            exit();
        }

        //If no error  
        $this->setUser($this->uid, $this->pwd, $this->email);

    }

    // checking for empty input
    private function emptyInput(){
        // $result;
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }


    //check if the username is a valid username
    private function invalidUid(){
        // $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }


    // check if email is valid email address
    private function invalidEmail(){
        // $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }


    //Check if password and repeat password don't match
    private function pwdMatch(){
        // $result;
        if($this->pwd !== $this->pwdRepeat){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }


    // check if username or password exists
    private function userExists(){
        // $result;
        if(!$this->checkUser($this->uid, $this->email)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

}