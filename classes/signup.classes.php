<?php
class Signup extends Dbh{
    
    protected function setUser($uid, $pwd, $email){
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?, ?, ?);');


        //Hashing the password
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        //if the statement fails 
        if(!$stmt->execute(array($uid, $hashedPwd, $email))){
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }
    }


    protected function checkUser($uid, $email){
        $stmt = $this->connect()->prepare('SELECT users_id FROM users WHERE users_id = ? OR users_email = ?');

        //if the statement fails 
        if(!$stmt->execute(array($uid, $email))){
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }

        //check if there was a result
        if($stmt->rowCount() > 0){
            $resultCheck = false;

        }else{
            $resultCheck = true;
        }

        return $resultCheck;
    }
}