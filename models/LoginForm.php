<?php

class LoginForm
{
    public $username;
    public $password;

    /**
     * @return bool
     * kulon szedjuk username es pass validfalasat > check usernam checkPassw
     */
    public function checkUsername()
    {
        $this->name = $this->getConnection()->real_escape_string($_POST["username"]);
        $this->password = $this->getConnection()->real_escape_string($_POST["password"]);
        $checkLogin = $this->getConnection()->query(" SELECT id, username, password FROM users WHERE username = '" . $this->name . "';");
        //checks if there was a user with this name or not
        if ($checkLogin->num_rows > 0) {
            $result = $checkLogin->fetch_object();
            //if both the username and the password match we set the sessions
            if ($this->password == $result->password){
                $_SESSION["logged_in"] = true;
                $_SESSION["username"] = $result->name;
                $_SESSION["uId"] = $result->id;
                //set the cookie for half an hour
                setcookie("username", $result->name, time () + 1800);
                return true;
            } else {
                Flash::error("Wrong username or password!");
                return false;
            }
        } else {
            Flash::error("Wrong username or password!");
            return false;
        }
    }

    /**
     * @return bool
     */
    public function validate()
    {
        if (empty($this->username)) {
            Flash::error("empty username...");
            return false;
        }

        if (empty($this->password)) {
            Flash::error("empty password...");
            return false;
        }

        if (strlen($this->password) < 6) {
            Flash::error("Too short pass..");
            return false;
        }

        //if !empty usergetbyusername

        return true;
    }



    public function login()
    {
        if (!$this->validate()) {
            return false;
        }

        //amajd $user = User::getuserbyusername
        $user->login();
        return true;

    }
}