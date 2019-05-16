<?php

interface iMethods
{
    public function validate();

    public function isNewRecord();

    public function insert();

    public function update();

    public function remove();

    public function save();
}