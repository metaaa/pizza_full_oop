<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/17/19
 * Time: 11:26 AM
 */

class BaseRecord extends Dbconfig
{
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