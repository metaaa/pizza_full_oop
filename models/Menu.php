<?php

class Menu extends Dbconfig
{
    public static function countRows(){
        $countQuery = "SELECT COUNT(mId) FROM menu";
        $countResult = Dbconfig::getInstance()->getConnection()->query($countQuery)->fetch_array();
        //print_r($countResult);
        return (100 / $countResult[0]);
    }

    public static function getAll()
    {
        $menuQuery = "SELECT * FROM menu";
        $menuQueryResult = Dbconfig::getInstance()->getConnection()->query($menuQuery);
        while ($row = $menuQueryResult->fetch_assoc()){
            echo '<li style="width: ' . self::countRows() . '%"><a href="index.php?page=' . $row['mLink'] . '">' . $row['mName'] . '</a>';
        }
    }
}