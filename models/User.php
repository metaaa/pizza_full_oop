<?php

class User extends Dbconfig implements iMethods
{
    public $id;
    public $name;
    public $credits;
    public $address;
    public $image;

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
}