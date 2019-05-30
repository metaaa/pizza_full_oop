<?php

class User
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

    /**
     * @return mixed
     */
    public function getUserByUsername()
    {
        $this->name = mysqli_real_escape_string(Dbconfig::getInstance()->getConnection(), $_POST["username"]);
        $getUserQuery = "SELECT uName FROM users WHERE uName = '" . $this->name . "';";
        $queryResult = Dbconfig::getInstance()->getConnection()->query($getUserQuery)->fetch_object();
        $this->name = get_object_vars($queryResult)["uName"];
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getUserByEmail()
    {
        $this->email = mysqli_real_escape_string(Dbconfig::getInstance()->getConnection(), $_POST["email"]);
        $getEmailQuery = "SELECT uEmail FROM users WHERE uEmail = '" . $this->email . "';";
        $queryResult = Dbconfig::getInstance()->getConnection()->query($getEmailQuery)->fetch_object();
        $this->email = get_object_vars($queryResult)["uEmail"];
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        $getIdQuery = "SELECT uId FROM users WHERE uName = '" . $this->getUserByUsername() . "';";
        $queryResult = Dbconfig::getInstance()->getConnection()->query($getIdQuery)->fetch_object();
        $this->id = get_object_vars($queryResult)["uId"];
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        $getPasswordQuery = "SELECT uPassword FROM users WHERE uId = '" . $this->getId() . "';";
        $queryResult = Dbconfig::getInstance()->getConnection()->query($getPasswordQuery)->fetch_object();
        $this->password = get_object_vars($queryResult)["uPassword"];
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getCredits()
    {
        $getCreditsQuery = "SELECT uCredits FROM users WHERE uId = '" . $this->getId() . "';";
        $queryResult = Dbconfig::getInstance()->getConnection()->query($getCreditsQuery)->fetch_object();
        $this->credits = get_object_vars($queryResult)["uCredits"];
        return $this->credits;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        $getAvatarQuery = "SELECT uAvatar FROM users WHERE uId = '" . $this->getId() . "';";
        $queryResult = Dbconfig::getInstance()->getConnection()->query($getAvatarQuery)->fetch_object();
        $this->avatar = get_object_vars($queryResult)["uAvatar"];
        return $this->avatar;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        $getCreatedAtQuery = "SELECT uCreatedAt FROM users WHERE uId = '" . $this->getId() . "';";
        $queryResult = Dbconfig::getInstance()->getConnection()->query($getCreatedAtQuery)->fetch_object();
        $this->createdAt = get_object_vars($queryResult)["uCreatedAt"];
        return $this->createdAt;
    }

    /**
     * @return mixed
     */
    public function getLastSeen()
    {
        $getLastSeenQuery = "SELECT uLastSeen FROM users WHERE uId = '" . $this->getId() . "';";
        $queryResult = Dbconfig::getInstance()->getConnection()->query($getLastSeenQuery)->fetch_object();
        $this->lastSeen = get_object_vars($queryResult)["uLastSeen"];
        return $this->lastSeen;
    }

    /**
     * @return mixed
     */
    public function getIsAdmin()
    {
        $isAdminQuery = "SELECT isAdmin FROM users WHERE uId = '" . $this->getId() . "';";
        $queryResult = Dbconfig::getInstance()->getConnection()->query($isAdminQuery)->fetch_object();
        $this->isAdmin = get_object_vars($queryResult)["isAdmin"];
        return $this->isAdmin;
    }



    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $credits
     */
    public function setCredits($credits)
    {
        $this->credits = $credits;
    }

    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * @param mixed $lastSeen
     */
    public function setLastSeen($lastSeen)
    {
        $this->lastSeen = $lastSeen;
    }

    /**
     * @param mixed $isAdmin
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }







}
