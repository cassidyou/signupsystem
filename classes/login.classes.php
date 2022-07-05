<?php
class Login extends Dbh{
    
    protected function getUser($uid, $pwd){
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?;');


        //Hashing the password
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        //if the statement fails 
        if(!$stmt->execute(array($uid, $hashedPwd))){
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }

        //if no user exists
        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        //fetch the password 
        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //check if the fetched password and inputted password are the same
        $checkPwd = password_verify($pwd, $pwdHashed[0]['users_pwd']);


        if($checkPwd == false){
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }elseif($checkPwd == true){
            $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ? AND users_pwd = ?;');

            if(!$stmt->execute(array($uid, $uid, $hashedPwd))){
                $stmt = null;
                header("Location: ../index.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

             session_start();
            
            $_SESSION['userid'] = $user[0]['users_id'];
            $_SESSION['useruid'] = $user[0]['users_uid'];

            
            $stmt = null;
        }


    }
}