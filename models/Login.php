<?php

class Login extends Dbconfig
{
    /**
     * @return bool
     */
    public function checkLoginDetails()
    {
        $userEmail = mysqli_real_escape_string($this->email);
        $userPassword = mysqli_real_escape_string($this->password);
        $userQuery = "SELECT email, password FROM users WHERE email = '$userEmail'";
        $queryResult = Dbconfig::getInstance()->getConnection()->query($userQuery)->fetch_assoc();
        if (!empty($queryResult)){
            if ($queryResult['email'] == $userEmail){
                if ($queryResult['password'] !== $userPassword){
                    return false;
                    //flash wrong password
                } else {
                    header('Location: ../admin/index.php');
                }
            }
            return false;
            //flash not registered
        }
        return false;
    }
}