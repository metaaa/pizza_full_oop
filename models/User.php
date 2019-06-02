<?php

class User
{
    public $uId;
    public $uName;
    public $uEmail;
    public $uPassword;
    public $uCredits;
    public $uAvatar;
    public $uCreatedAt;
    public $uLastSeen;
    public $isAdmin;

    /**
     * @param string $name
     * @return mixed
     */
    public static function findByName($name)
    {
        $user = new User();

        $getUserQuery = "SELECT * FROM users WHERE uName = '" . $name . "';";
        $queryResult = Dbconfig::getInstance()->getConnection()->query($getUserQuery)->fetch_object();
        if ($queryResult == null) {
            return null;
        }

        $queryResult = get_object_vars($queryResult);
        foreach ($queryResult as $key => $item) {
            $user->$key = $item;
        }
        return $user;
    }

    /**
     * @param $password
     * @return bool
     */
    public function checkPassword($password)
    {
        return $this->uPassword === crypt($password, $this->uPassword);
    }

    public function login()
    {
        $_SESSION["logged_in"] = true;
        $_SESSION["uId"] = $this->uId;
        $_SESSION["uName"] = $this->uName;
        $_SESSION["isAdmin"] = true;
        return true;

    }

    /**
     * @return mixed
     */
    public function getUserByEmail()
    {
        $this->email = mysqli_real_escape_string(Dbconfig::getInstance()->getConnection(), $_POST["email"]);
        $getEmailQuery = "SELECT uEmail FROM users WHERE uEmail = '" . $this->email . "';";
        $queryResult = Dbconfig::getInstance()->getConnection()->query($getEmailQuery)->fetch_object();
        $this->email = get_object_vars($queryResult)["uEmail"];
        return $this->uEmail;
    }


    public static function setCookies()
    {
        if ($_POST["rememberMe"] == "on") {
            setcookie('logged_in', $_SESSION["logged_in"], time() + (86400 * 5), "/"); // 86400 = 1 day
            setcookie('uId', $_SESSION["uId"], time() + (86400 * 5), "/");
            setcookie('username', $_SESSION["username"], time() + (86400 * 5), "/");
        }

    }
}
