<?php

class Dbconfig
{
    private $serverName;
    private $dbName;
    private $dbUsername;
    private $dbPassword;

    private static $instance;

    private $connection;

    /**
     * Get an instance of the Database and return it
     *
     * @return Dbconfig
     */
    public static function getInstance()
    {
        if (!self::$instance) { // If no instance then make one
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Dbconfig constructor.
     */
    private function __construct()
    {
        $config = require "connection.php";
        foreach ($config as $key => $value){
            $this->$key = $value;
        }

        $this->connection = new mysqli($this->serverName, $this->dbUsername, $this->dbPassword, $this->dbName);
        //error handling
        if (mysqli_connect_error()){
            trigger_error("Failed to connect to Database: " . mysqli_connect_error(), E_USER_ERROR);
        }
    }

    /**
     * Magic method clone is empty to prevent duplication of connection
     */
    private function __clone()
    {

    }

    /**
     * @return mysqli
     */
    public function getConnection()
    {
        return $this->connection;
    }
}