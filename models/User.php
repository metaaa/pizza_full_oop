<?php

class User implements iMethods
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
     * Validates the model's attributes.
     * @return bool
     */
    public function validate()
    {
        if (empty($this->name) || empty($this->credits) || empty($this->address) || empty($this->image)){
            return false;
        } else {
            return true;
        }
    }

    /**
     * Checks whether the current model is a freshly created one or not.
     * @return bool
     */
    public function isNewRecord()
    {
        return empty($this->id);
    }

    /**
     * Insert a user record to database.
     *
     * @return bool|mysqli_result
     */
    public function insert()
    {
        $addUserQuery = "INSERT INTO users (uId, uName, uCredits, uAddress, uImage) VALUES (null,'$this->name', '$this->credits', '$this->address', '$this->image')";
        $addResult = Dbconfig::getInstance()->getConnection()->query($addUserQuery);
        return $addResult;
    }

    /**
     * Removes a single user record from database.
     * @return bool|mysqli_result
     */
    public function remove()
    {
        $removeUserQuery = "DELETE FROM users WHERE uId = '$this->id'";
        $removeResult = Dbconfig::getInstance()->getConnection()->query($removeUserQuery);

        return $removeResult;
    }

    /**
     * Updates a user record in database.
     *
     * @return bool
     */
    public function update()
    {
        $columns = array('name', 'credits', 'address', 'image');
        $values = $setValues = array();
        foreach ($columns as $column){
            if (isset($this->$column)){

            }
        }

        //$updatePizzaQuery = "UPDATE pizzas SET name='$this->name' price='$this->price', ";
    }


    /**
     * Saves the current instance of user to database.
     *
     * @return bool|mysqli_result
     */
    public function save()
    {
        if ($this->validate()) {
            if ($this->isNewRecord()) {
                return $this->insert();
            } else {
                return $this->update();
            }
        }

        return false;
    }

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
        $getIdQuery = "SELECT uId FROM users WHERE uName = '" . $this->name . "';";
        $queryResult = Dbconfig::getInstance()->getConnection()->query($getIdQuery)->fetch_object();
        $this->id = get_object_vars($queryResult)["uId"];
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        $getPasswordQuery = "SELECT uPassword FROM users WHERE uId = '" . $this->id . "';";
        $queryResult = Dbconfig::getInstance()->getConnection()->query($getPasswordQuery)->fetch_object();
        $this->password = get_object_vars($queryResult)["uPassword"];
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getCredits()
    {
        $getCreditsQuery = "SELECT uCredits FROM users WHERE uId = '" . $this->id . "';";
        $queryResult = Dbconfig::getInstance()->getConnection()->query($getCreditsQuery)->fetch_object();
        $this->credits = get_object_vars($queryResult)["uCredits"];
        return $this->credits;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        $getAvatarQuery = "SELECT uAvatar FROM users WHERE uId = '" . $this->id . "';";
        $queryResult = Dbconfig::getInstance()->getConnection()->query($getAvatarQuery)->fetch_object();
        $this->avatar = get_object_vars($queryResult)["uAvatar"];
        return $this->avatar;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        $getCreatedAtQuery = "SELECT uCreatedAt FROM users WHERE uId = '" . $this->id . "';";
        $queryResult = Dbconfig::getInstance()->getConnection()->query($getCreatedAtQuery)->fetch_object();
        $this->createdAt = get_object_vars($queryResult)["uCreatedAt"];
        return $this->createdAt;
    }

    /**
     * @return mixed
     */
    public function getLastSeen()
    {
        $getLastSeenQuery = "SELECT uLastSeen FROM users WHERE uId = '" . $this->id . "';";
        $queryResult = Dbconfig::getInstance()->getConnection()->query($getLastSeenQuery)->fetch_object();
        $this->lastSeen = get_object_vars($queryResult)["uLastSeen"];
        return $this->lastSeen;
    }

    /**
     * @return mixed
     */
    public function getIsAdmin()
    {
        $isAdminQuery = "SELECT isAdmin FROM users WHERE uId = '" . $this->id . "';";
        $queryResult = Dbconfig::getInstance()->getConnection()->query($isAdminQuery);
        $this->isAdmin = get_object_vars($queryResult)["isAdmin"];
        var_dump($this); die;
        return $this->isAdmin;
    }


}
