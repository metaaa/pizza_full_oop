<?php

class LoginForm
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $credits;
    public $avatar;
    public $createdAt;
    public $lastSeen;
    public $isAdmin;
    protected $user;

    /**
     * fills up $user with the queried user data
     *
     * @return User
     */
   protected function getUser()
    {
        if ($this->user === null) {
            $this->user = new User();
            $this->id = $this->user->getId();
            $this->name = $this->user->getUserByUsername();
            $this->email = $this->user->getUserByEmail();
            $this->password = $this->user->getPassword();
            $this->credits = $this->user->getCredits();
            $this->avatar = $this->user->getAvatar();
            $this->createdAt = $this->user->getCreatedAt();
            $this->lastSeen = $this->user->getLastSeen();
            $this->isAdmin = $this->user->getIsAdmin();
        }
        return $this->user;
    }


    /**
     * checks whether the user exists in the database or not
     *
     * @return bool
     */
    public function checkUsername()
    {
        if (empty($this->name)) {
            Flash::error("User doesn't exist");
            return false;
        }
        return true;
    }

    /**
     * checks whether the password from POST equals to the one obtained from the db or not
     *
     * @return bool
     */
    public function checkPassword()
    {
        if ($this->password !== Dbconfig::getInstance()->getConnection()->real_escape_string($_POST["password"])) {
            Flash::error("Incorrect password!");
            return false;
        }
        return true;
    }

    /**
     * checks if the user is admin
     *
     * @return bool
     */
    public function checkAdmin()
    {
        if ($this->isAdmin == NULL){
            Flash::error("not an admin");
            return false;
        }
        return true;
    }

    /**
     * validates the form
     *
     * @return bool
     */
    public function validate()
    {
        if (empty($this->name)) {
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

        $user = User::findByName($this->name);

        if (empty($user)) {
            Flash::error('Wrong username or password!');
            return false;
        }

        if (!$user->checkPassword($this->password)) {
            Flash::error("Wrong username or password!");

            return false;
        }

        return true;
    }
    /**
     * logs the user in if validation and user data checks returned true
     *
     * @return bool
     */
    public function login()
    {
        //$this->getUser();

        if (!$this->validate()) {
            return false;
        }

        $user = User::findByName($this->name);

        return $user->login();
    }

}