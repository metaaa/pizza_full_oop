<?php

class User extends Dbconfig implements iMethods
{
    private $id;
    private $name;
    private $password;
    private $email;
    private $credits;
    private $address;
    private $image;

    /**
     * Validates the model's attributes.
     * @return bool
     */
    public function validate()
    {
        if (empty($this->name) || empty($this->credits) || empty($this->address) || empty($this->image)){
            return false;
        } else {
            return true;
        }
    }

    /**
     * Checks whether the current model is a freshly created one or not.
     * @return bool
     */
    public function isNewRecord()
    {
        return empty($this->id);
    }

    /**
     * Insert a user record to database.
     *
     * @return bool|mysqli_result
     */
    public function insert()
    {
        $addUserQuery = "INSERT INTO users (uId, uName, uCredits, uAddress, uImage) VALUES (null,'$this->name', '$this->credits', '$this->address', '$this->image')";
        $addResult = Dbconfig::getInstance()->getConnection()->query($addUserQuery);
        return $addResult;
    }

    /**
     * Removes a single user record from database.
     * @return bool|mysqli_result
     */
    public function remove()
    {
        $removeUserQuery = "DELETE FROM users WHERE uId = '$this->id'";
        $removeResult = Dbconfig::getInstance()->getConnection()->query($removeUserQuery);

        return $removeResult;
    }

    /**
     * Updates a user record in database.
     *
     * @return bool
     */
    public function update()
    {
        $columns = array('name', 'credits', 'address', 'image');
        $values = $setValues = array();
        foreach ($columns as $column){
            if (isset($this->$column)){

            }
        }

        //$updatePizzaQuery = "UPDATE pizzas SET name='$this->name' price='$this->price', ";
    }


    /**
     * Saves the current instance of user to database.
     *
     * @return bool|mysqli_result
     */
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

    /**
     * Logs the user in
     *
     * @return bool
     */
    public function login()
    {
        $this->name = $this->getConnection()->real_escape_string($_POST["username"]);
        $this->password = $this->getConnection()->real_escape_string($_POST["password"]);
        $checkLogin = $this->getConnection()->query(" SELECT id, username, password FROM users WHERE username = '" . $this->name . "';");
        //checks if there was a user with this name or not
        if ($checkLogin->num_rows > 0) {
            $result = $checkLogin->fetch_object();
            //if both the username and the password match we set the sessions
            if ($this->password == $result->password){
                $_SESSION["logged_in"] = true;
                $_SESSION["username"] = $result->name;
                $_SESSION["uId"] = $result->id;
            //set the cookie for half an hour
                setcookie("username", $result->name, time () + 1800);
                return true;
            } else {
                Flash::error("Wrong username or password!");
                return false;
            }
        } else {
            Flash::error("Wrong username or password!");
            return false;
        }
    }

    /**
     * Logs the user out.
     */
    public function logout()
    {
        if (isset($_SESSION["logged_in"])){
            session_unset();
            session_destroy();
            header("location: ../index.php");
        }
    }

    public function register()
    {
        $this->name = $this->getConnection()->real_escape_string($_POST["username"]);
        $this->password = $this->getConnection()->real_escape_string($_POST["password"]);
        $this->email = $this->getConnection()->real_escape_string($_POST["email"]);
        $checkRegister = $this->getConnection()->query("SELECT username, email FROM users WHERE email = '" . $this->email . "';");
    }
}
