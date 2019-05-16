<?php

interface iMethods{
    public function validate();
    public function isNewRecord();
    public function add();
    public function modify();
    public function remove();
    public function save();
}