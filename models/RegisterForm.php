<?php

class RegisterForm
{
    public $username;
    public $password;
    public $email;

    /**
     * @return bool
     */
    public function checkUsername()
    {
        $user = new User();
        $this->username = $user->getUserByUsername();
        if (!empty($this->username)) {
            Flash::error("Username is taken!");
            return false;
        }
        return true;
    }

    /**
     * @return bool
     */
    public function checkPassword()
    {
            if (strlen($_POST["password"]) < 5) {
            Flash::error("Too short password!");
            return false;
        }
        Flash::error("logged in");
        return true;
    }

    public function checkEmail()
    {
        if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$this->email))
        {
            return false;
        }
        //checks for presence of @ and .
        if (!stristr($this->email,"@") OR !stristr($this->email,".")){
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

        if (empty($this->email)) {
            Flash::error("Fill the email!");
            return false;
        }

        if (strlen($this->password) < 4) {
            Flash::error("Too short password!");
            return false;
        }

        if (!$this->checkEmail()){
            Flash::error("Invalid email address!");
            return false;
        }

        if (empty($user->getUserByUsername())) {
            return false;
        }

        if (empty($user->getUserByPassword())) {
            return false;
        }

        if (empty($user->getUserByEmail())) {
            return false;
        }

        return true;
    }

    public function createUser()
    {
        $createQuery = "INSERT INTO users ('id', 'username', 'email', 'password') VALUES ('" . NULL . "', '" . $this->username . "', '" . $this->email . "', '" . $this->password . "');";
        $resultQuery = Dbconfig::getInstance()->getConnection()->query($createQuery);
    }

    /**
     * @return bool
     */
    public function register()
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
        if(!$this->checkEmail()) {
            return false;
        }

        $this->createUser();

        return true;
    }

}