<?php

/**
 * Class of configuration DB
 */
class Db {
    const USER = 'sql7242006';
    const PASS = '14pVNiTkQ8';
    const HOST = 'sql7.freemysqlhosting.net';
    const DB = 'sql7242006';

    public static function dbConnect(){
        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db = self::DB;

        try {
            $connect = new PDO("mysql:dbname=$db;host=$host;charset=UTF8",$user, $pass);
        } catch (PDOException $e)
        {
            exit($e->getMessage());
        }
        return $connect;
    }
}