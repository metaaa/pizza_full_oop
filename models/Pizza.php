<?php

class Pizza extends BaseRecord implements iMethods
{
    public $id;
    public $name;
    public $price;
    public $items;
    public $image;

    /**
     * Validates the model's attributes.
     * @return bool
     */
    public function validate()
    {
        if (empty($this->name) || empty($this->price) || empty($this->items) || empty($this->image)){
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
     * Insert a new pizza record to database.
     *
     * @return bool|mysqli_result
     */
    public function insert()
    {
        $addPizzaQuery = "INSERT INTO pizzas (pId, pName, pItems, pPrice, pImage) VALUES (null,'$this->name', '$this->items', '$this->price', '$this->image')";
        $addResult = Dbconfig::getInstance()->getConnection()->query($addPizzaQuery);
        return $addResult;
    }

    /**
     * Removes a single pizza record from database.
     * @return bool|mysqli_result
     */
    public function remove()
    {
        $removePizzaQuery = "DELETE FROM pizzas WHERE pId = '$this->id'";
        $removeResult = Dbconfig::getInstance()->getConnection()->query($removePizzaQuery);

        return $removeResult;
    }

    /**
     * Updates a pizza record in database.
     *
     * @return bool
     */
    public function update()
    {
        $columns = array('name', 'price', 'items', 'image');
        $values = $setValues = array();
        foreach ($columns as $column){
            if (isset($this->$column)){

            }
        }
        //$updatePizzaQuery = "UPDATE pizzas SET name='$this->name' price='$this->price', ";
    }

}

