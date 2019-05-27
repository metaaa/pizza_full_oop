<?php

class LoginForm
{
    public $username;
    public $password;


    /**
     * @return bool
     */
    public function checkUsername()
    {
        $user = new User();
        $this->username = $user->getUserByUsername();
        if (empty($this->username)) {
            Flash::error("User doesn't exist");
            return false;
        }
        return true;
    }

    public function checkPassword()
    {
        $user = new User();
        $this->password = $user->getUserByPassword();
        if ($this->password !== $_POST["password"]) {

            var_dump($this->password); die;
            Flash::error("Incorrect password!");
            return false;
        }
        Flash::error("logged in");
        return true;
    }

    /**
     * @return bool
     */
    public function validate()
    {
        $user = new User();
        if (empty($this->username)) {
            Flash::error("Fill the username!");
            return false;
        }

        if (empty($this->password)) {
            Flash::error("Fill the password!");
            return false;
        }

        if (strlen($this->password) < 4) {
            Flash::error("Too short password!");
            return false;
        }

        if (empty($user->getUserByUsername())) {
            return false;
        }

        if (empty($user->getUserByPassword())) {
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

        return true;
    }

}