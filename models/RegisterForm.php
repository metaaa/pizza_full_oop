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
        $this->password = $_POST["password"];
        if (strlen($this->password) < 5) {
            Flash::error("Too short password!");
            return false;
        }
        return true;
    }

    public function checkEmail()
    {
        $this->email = $_POST["email"];
          //var_dump($this->email); die;
        if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$this->email))
        {
            return false;
        }
        //checks for presence of @ and .
        if (!stristr($this->email,"@") || !stristr($this->email,".")){
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

        if (!$this->checkEmail()){
            Flash::error("Invalid email address!");
            return false;
        }


        if (!$this->checkPassword()) {
            Flash::error("Password is too short!");
            return false;
        }

        if (!empty($user->getUserByUsername())) {
            Flash::error("Username is taken!");
            return false;
        }

        if (!empty($user->getUserByEmail())) {
            Flash::error("Email is already registered!");
            return false;
        }

        return true;
    }

    public function createUser()
    {
        $this->username = mysqli_real_escape_string($_POST['username']);
        $createQuery = "INSERT INTO `users` (username, email, password) VALUES ('" . $this->username . "', '" . $this->email . "', '" . $this->password . "');";
        $resultQuery = Dbconfig::getInstance()->getConnection()->real_query($createQuery);
        //var_dump($resultQuery); die;
        if ($resultQuery === false){
            Flash::error("Database error!");
            return false;
        }
        return true;
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

        if (!$this->createUser()) {
            return false;
        }

        return true;
    }

}