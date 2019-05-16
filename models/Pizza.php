<?php

class Pizza extends Dbconfig implements iMethods
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
        if (empty($this->pizza_name) || empty($this->pizza_price) || empty($this->pizza_items) || empty($this->pizza_image)){
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
        // TODO: implement update.
    }


    /**
     * Saves the current instance of pizza to database.
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

