<?php

include 'Dbconfig.php';

class Pizza extends Dbconfig {
    //Connect to database
    public function getConnection()
    {
        return parent::getConnection(); // TODO: Change the autogenerated stub
    }
    //Variables
    var $pizza_id;
    var $pizza_name;
    var $pizza_price;
    var $pizza_items;
    var $pizza_image;
    //Validate form
    public function validatePizza(){
        if (empty($this->pizza_name) || empty($this->pizza_price) || empty($this->pizza_items) || empty($this->pizza_image)){
            return false;
        } else {
            return true;
        }
    }
    //Checks whether it's a new pizza
    public function isNewPizza(){
        return empty($this->pizza_id);
    }
    //Add new pizza
    public function addPizza($pName, $pItems, $pPrice, $pImage){
        $this->pizza_name = $pName;
        $this->pizza_items = $pItems;
        $this->pizza_price = $pPrice;
        $this->pizza_image = $pImage;
        $addPizzaQuery = "INSERT INTO pizzas (pId, pName, pItems, pPrice, pImage) VALUES (null,'$this->pizza_name', '$this->pizza_items', '$this->pizza_price', '$this->pizza_image')";
    }
    //Delete a pizza
    function removePizza($delete_pizza_id){
        $this->pizza_id = $delete_pizza_id;
        $removePizzaQuery = "DELETE FROM pizzas WHERE pId = '$delete_pizza_id'";

    }
    //Modify a pizza
    function modifyPizza(){

    }
    //Save the modifications
    public function savePizza(){
        if ($this->validatePizza()) {
            if ($this->isNewPizza()) {
                return $this->addPizza();
            } else {
                return $this->modifyPizza();
            }
        } else {
            return false;
        }
    }
}

