<?php

class LoginForm extends User
{
    public $username;
    public $password;

    /**
     * @return bool
     */
    public function checkUsername()
    {
        $queriedUserdata = $this->getUserByUsername();
        $this->username = $queriedUserdata;
//        $this->username = $this->getUserByUsername();
//        $this->username = $this->getConnection()->real_escape_string($_POST["username"]);
//        $usernameQuery = $this->getConnection()->query(" SELECT  username FROM users WHERE username = '" . $this->name . "';");
        //checks if there was a user with this name or not
        if ($this->username->num_rows > 0) {
            return true;
        } else {
            Flash::error("User doesn\'t exist");
            return false;
        }
    }

    public function checkPassword()
    {
        $queriedPassword = $this->getUserByPassword();
//        $this->username = $this->getConnection()->real_escape_string($_POST["username"]);
//        $this->password = $this->getConnection()->real_escape_string($_POST["password"]);
//        $passwordQuery = $this->getConnection()->query("SELECT password FROM users WHERE usename = '" . $this->username . "';")->fetch_object();
        if ($this->password == $queriedPassword) {
            return true;
        } else {
            Flash::error("Incorrect password!");
            return false;
        }
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
            Flash::error("User not found!");
            return false;
        }

        if (empty($this->getUserByPassword())) {
            Flash::error("Wrong Password!");
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function login()
    {
        if (!$this->validate()) {
            return false;
        }
        if (!$this->checkUsername()) {
            return false;
        }
        if (!$this->checkPassword()) {
            return false;
        }

        $user = new User();

        //amajd $user = User::getuserbyusername

        return true;
    }
}