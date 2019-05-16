<?php

include 'Dbconfig.php';

class Pizza extends Dbconfig implements iMethods {
    //Variables
    var $pizza_id;
    var $pizza_name;
    var $pizza_price;
    var $pizza_items;
    var $pizza_image;
    //Validate form
    public function validate(){
        if (empty($this->pizza_name) || empty($this->pizza_price) || empty($this->pizza_items) || empty($this->pizza_image)){
            return false;
        } else {
            return true;
        }
    }
    //Checks whether it's a new pizza
    public function isNewRecord(){
        return empty($this->pizza_id);
    }
    //Add new pizza
    public function add(){
        $this->pizza_name = $pName;
        $this->pizza_items = $pItems;
        $this->pizza_price = $pPrice;
        $this->pizza_image = $pImage;
        $addPizzaQuery = "INSERT INTO pizzas (pId, pName, pItems, pPrice, pImage) VALUES (null,'$this->pizza_name', '$this->pizza_items', '$this->pizza_price', '$this->pizza_image')";
        $addResult = Dbconfig::getInstance()->getConnection()->query($addPizzaQuery);
        return $addResult;
    }
    //Delete a pizza
    public function remove(){
        $this->pizza_id = $delete_pizza_id;
        $removePizzaQuery = "DELETE FROM pizzas WHERE pId = '$delete_pizza_id'";
        $removeResult = Dbconfig::getInstance()->getConnection()->query($removePizzaQuery);
        return $removeResult;
    }
    //Modify a pizza
    public function modify(){

    }
    //Save the modifications
    public function save(){
        if ($this->validate()) {
            if ($this->isNew()) {
                return $this->add();
            } else {
                return $this->modify();
            }
        } else {
            return false;
        }
    }
}

