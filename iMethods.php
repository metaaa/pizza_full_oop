<?php

interface iMethods{
    public function validate();
    public function isNewRecord();
    public function add(...$params);
    public function modify(...$params);
    public function remove($id);
    public function save();
}