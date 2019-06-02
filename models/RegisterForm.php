<?php

class RegisterForm
{
    public $uName;
    public $uEmail;
    public $uPassword;
    protected $user;

    /**
     * @return bool
     */
    public function validate()
    {
        if (empty($this->uName)) {
            Flash::error("Fill the username!");
            return false;
        }
        if (empty($this->uPassword)) {
            Flash::error("Fill the password!");
            return false;
        }

        if (empty($this->uEmail)) {
            Flash::error("Fill the email!");
            return false;
        }

        if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$this->uEmail))
        {
            return false;
        }

        //checks for presence of @ and .
        if (!stristr($this->uEmail,"@") || !stristr($this->uEmail,".")){
            return false;
        }

        $user = User::findByName($this->uName);

        if (!empty($user)) {
            Flash::error('Username is taken!');
            return false;
        }

        return true;
    }

    public function createUser()
    {
        $this->uName = $_POST['uName'];
        $createQuery = "INSERT INTO `users` (uName, uEmail, uPassword) VALUES ('" . $this->uName . "', '" . $this->uEmail . "', '" . crypt($this->uPassword) . "');";
        $resultQuery = Dbconfig::getInstance()->getConnection()->real_query($createQuery);
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

        if (!$this->createUser()) {
            return false;
        }

        return true;
    }

}