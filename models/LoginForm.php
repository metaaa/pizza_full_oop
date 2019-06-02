<?php

class LoginForm
{
    public $uName;
    public $uPassword;
    protected $user;

    /**
     * validates the form
     *
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

        if (strlen($this->uPassword) < 4) {
            Flash::error("Too short password!");
            return false;
        }

        $user = User::findByName($this->uName);

        if (empty($user)) {
            Flash::error('Wrong username or password!');
            return false;
        }

        if (!$user->checkPassword($this->uPassword)) {
            Flash::error("Wrong username or password!");
            return false;
        }

        return true;

    }
    /**
     * logs the user in if validation returned true
     *
     * @return bool
     */
    public function login()
    {
        $user = User::findByName($this->uName);

        if (!$this->validate()) {
            return false;
        }

        return $user->login();
    }
}