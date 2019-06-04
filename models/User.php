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

    /**
     * setting the cookies
     */
    public static function setCookies()
    {
        if ($_POST["rememberMe"] == "on") {
            setcookie('logged_in', $_SESSION["logged_in"], time() + (86400 * 5), "/"); // 86400 = 1 day
            setcookie('uId', $_SESSION["uId"], time() + (86400 * 5), "/");
            setcookie('username', $_SESSION["username"], time() + (86400 * 5), "/");
        }

    }
}
