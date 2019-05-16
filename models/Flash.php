<?php

class Flash
{
    /**
     * @param $message
     */
    public static function error($message)
    {
        $_SESSION['flash-error'] = $message;
    }

    /**
     * @param $message
     */
    public static function success($message)
    {
        $_SESSION['flash-success'] = $message;
    }

    /**
     * @return null
     */
    public static function getError()
    {
        if (isset($_SESSION['flash-error'])) {
            return $_SESSION['flash-error'];
        }
        return null;
    }

    /**
     * @return null
     */
    public static function getSuccess()
    {
        if (isset($_SESSION['flash-success'])) {
            return $_SESSION['flash-success'];
        }
        return null;
    }

    /**
     *
     */
    public static function flush()
    {
        unset($_SESSION['flash-error']);
        unset($_SESSION['flash-success']);
    }
}
