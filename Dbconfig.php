<?php

class Dbconfig{

    protected $serverName;
    protected $dbName;
    protected $dbUsername;
    protected $dbPassword;

    function __construct(){
        $this->serverName = 'mysql.rackhost.hu';
        $this->dbName = 'c9659metadb';
        $this->dbUsername = 'c9659metaaa';
        $this->dbPassword = 'nope';
    }
}