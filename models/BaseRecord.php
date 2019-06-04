<?php

class BaseRecord
{

    public static function getAll($tableName)
    {
        $getAllQuery = "SELECT * FROM " . $tableName . ";";
        if ($tableName == "users") {
            $users[] = "";
            $record = Dbconfig::getInstance()->getConnection()->query($getAllQuery);

            while ($row = $record->fetch_object()) {
                $users[] = $row;
            }
            return $users;
        }

        if ($tableName == "pizzas") {
            $pizzas[] = "";
            $record = Dbconfig::getInstance()->getConnection()->query($getAllQuery);

            while ($row = $record->fetch_object()) {
                $pizzas[] = $row;
            }
            return $pizzas;
        }

        return false;
    }
    
    /**
     * Validates the model's attributes.
     * @return bool
     */
    public function validate($object)
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


    public function getAllRecords()
    {
        return $this->getAll();
    }
}