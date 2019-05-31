<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/27/19
 * Time: 7:38 PM
 */

class QueryBuilder
{
    public static function Query($sqlQuery)
    {
        $results = Dbconfig::getInstance()->getConnection()->query($sqlQuery);
        return $results;
    }
}