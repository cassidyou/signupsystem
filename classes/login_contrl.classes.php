<?php


class LoginContr extends Login{
    private $uid;
    private $pwd;


    public function __construct($uid, $pwd){
        $this->uid = $uid;
        $this->pwd = $pwd;
    }
   
    //Signup user
    public function loginUser(){
        //if any input is empty
        if($this->emptyInput() == false){
            //echo "Empty input!" 
            header("location: ../index.php?error=emptyinput");
            exit();
        }

   
        $this->getUser($this->uid, $this->pwd);

    }

    // checking for empty input
    private function emptyInput(){
        // $result;
        if(empty($this->uid) || empty($this->pwd)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }


}