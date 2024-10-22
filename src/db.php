<?php

namespace Oop2;

class db
{
    public static Mysql $db;

    public function __construct()
    {
        self::$db = new Mysql();
        self::$db->connect("localhost", "oopproj2", "root", "");
    }
}