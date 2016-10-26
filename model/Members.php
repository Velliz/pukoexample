<?php
namespace model;

use pukoframework\pda\DBI;

class Members
{

    public static function Create($data)
    {
        return DBI::Prepare('members')->Save($data);
    }

    public static function Update($where, $data)
    {
        return DBI::Prepare('members')->Update($where, $data);
    }

    public static function GetAll()
    {
        return DBI::Prepare("SELECT * FROM `members`")->GetData();
    }

    public static function GetID($id)
    {
        return DBI::Prepare("SELECT * FROM `members` WHERE `id` = @1")->GetData($id);
    }

    public static function CountAll()
    {
        return DBI::Prepare("SELECT COUNT(*) total FROM `members`;")->GetData();
    }
    
}