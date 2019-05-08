<?php
class Dbconfig{

    protected $serverName;
    protected $dbName;
    protected $dbUsername;
    protected $dbPassword;
    private static $instance;
    private $connection;

    //Get an instance of the Database and return Instance

    public static function getInstance() {
        if(!self::$instance) { // If no instance then make one
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct(){
        $config = require(connection.php);
        foreach ($config as $key => $value){
            $this->$key = $value;
        }

        $this->connection = new mysqli($this->serverName, $this->dbUsername, $this->dbPassword, $this->dbName);
        //error handling
        if (mysqli_connect_error()){
            trigger_error("Failed to connect to Database: " . mysqli_connect_error(), E_USER_ERROR);
        }
    }
    public function getConnection(){
        return $this->connection;
    }
}