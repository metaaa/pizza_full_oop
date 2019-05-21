<?php

class LoginForm extends User
{
    public $username;
    public $password;

    /**
     * @return bool
     * kulon szedjuk username es pass validfalasat > check usernam checkPassw
     */
    public function checkUsername()
    {
        $this->username = $this->getConnection()->real_escape_string($_POST["username"]);
        $this->password = $this->getConnection()->real_escape_string($_POST["password"]);
        $checkLogin = $this->getConnection()->query(" SELECT id, username, password FROM users WHERE username = '" . $this->name . "';");
        //checks if there was a user with this name or not
        if ($checkLogin->num_rows > 0) {
            $result = $checkLogin->fetch_object();
            //if both the username and the password match we set the sessions
            if ($this->password == $result->password){

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

    public function checkPassword()
    {
        //$this->username =
    }

    /**
     * @return bool
     */
    public function validate()
    {
        if (empty($this->username)) {
            Flash::error("Fill the username!");
            return false;
        }

        if (empty($this->password)) {
            Flash::error("Fill the password!");
            return false;
        }

        if (strlen($this->password) < 6) {
            Flash::error("Too short password!");
            return false;
        }

        if (empty($this->getUserByUsername())) {
            var_dump("asdasdas");
            Flash::error("User not found!");
            return false;
        }

        if (empty($this->getUserByPassword())) {
            Flash::error("Wrong Password!");
            return false;
        }

        return true;
    }



    public function login()
    {
        if (!$this->validate()) {
            return false;
        }
        $user = new User();
        $user = $this->getUserByUsername();
        //amajd $user = User::getuserbyusername

        return true;

    }
}