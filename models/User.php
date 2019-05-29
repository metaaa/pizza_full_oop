<?php

class User implements iMethods
{
    public $id;
    public $name;
    public $password;
    public $email;
    public $credits;
    public $address;
    public $image;
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
     * @return object|stdClass
     */
    public function getUserByUsername()
    {
        $this->name = mysqli_real_escape_string(Dbconfig::getInstance()->getConnection(), $_POST["username"]);
        $getUserQuery = "SELECT uName FROM users WHERE uName = '" . $_POST["username"] . "';";
        $queryResult = Dbconfig::getInstance()->getConnection()->query($getUserQuery)->fetch_object();
        return $queryResult;
    }

    /**
     * @return object|stdClass
     */
    public function getUserByPassword()
    {
        $getUserQuery = "SELECT uPassword FROM users WHERE uName = '" . $_POST["username"] . "';";
        $queryResult = Dbconfig::getInstance()->getConnection()->query($getUserQuery)->fetch_object();
        return get_object_vars($queryResult)["password"];
    }

    public function getUserByEmail()
    {
        $getUserQuery = "SELECT uEmail FROM users WHERE uName = '" . $_POST["username"] . "';";
        $queryResult = Dbconfig::getInstance()->getConnection()->query($getUserQuery);
        //var_dump($queryResult); die;
        return get_object_vars($queryResult)["email"];
    }
}
