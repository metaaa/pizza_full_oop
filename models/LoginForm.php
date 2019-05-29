<?php

class LoginForm
{
    public $id;
    public $username;
    public $password;
    public $isAdmin;
    public $rememberMe;



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

    /**
     * @return bool
     */
    public function checkPassword()
    {
        $user = new User();
        $this->password = $user->getPassword();
        if ($this->password !== $_POST["password"]) {
            Flash::error("Incorrect password!");
            return false;
        }
        return true;
    }

    /**
     * @return bool
     */
    public function checkAdmin()
    {
        $user = new User();
        $this->isAdmin = $user->getIsAdmin();
        if ($this->isAdmin == NULL){
            Flash::error("not an admin");
            return false;
        }
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

        if (empty($user->getPassword())) {
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