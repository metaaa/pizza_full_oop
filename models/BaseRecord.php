<?php

class BaseRecord extends Dbconfig
{
    public function save()
    {
        if ($this->validate())
        {
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