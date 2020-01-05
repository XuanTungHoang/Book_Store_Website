<?php

final class Database
{

//    config
    private static $host = 'localhost';
    private static $user = 'root';
    private static $pass = '';
    private static $dbname = 'tung';



    private static $dbh = null;
    final public static function getInstance()
    {
        if (self::$dbh === null) {
            $dsn = 'mysql:host=' . self::$host . ';charset=' . 'utf8' . ';dbname=' . self::$dbname;
            try {
                self::$dbh = new PDO($dsn, self::$user, self::$pass, [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT
                ]);
            } catch (PDOException $e) {
                error_log($e->getMessage());
                ob_clean();
                die('DATABASE: Connection error.');
            }
        }
        return self::$dbh;
    }
}
