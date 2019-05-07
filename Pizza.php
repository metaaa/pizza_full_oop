<?php
class Pizza
{
    var $pizza_id;
    var $pizza_name;
    var $pizza_price;
    var $pizza_items;
    var $pizza_image;

    public function validatePizza(){
        if (empty($this->pizza_name) || empty($this->pizza_price) || empty($this->pizza_items) || empty($this->pizza_image)){
            return false;
        } else {
            return true;
        }
    }

    public function isNewPizza(){
        return empty($this->pizza_id);
    }

    public function addPizza(){
        $addPizzaQuery = "INSERT INTO pizzas (pId, pName, pItems, pPrice, pImage) VALUES (null,'$this->pizza_name', '$this->pizza_items', '$this->pizza_price', '$this->pizza_image')";
    }

    function removePizza($delete_pizza_id){
        $this->pizza_id = $delete_pizza_id;

    }

    function modifyPizza (){

    }

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

