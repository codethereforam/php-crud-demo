<?php
/**
 * Created by IntelliJ IDEA.
 * User: thinkam
 * Date: 1/23/18
 * Time: 9:13 PM
 */

namespace util;


use PDO;

class DatabaseUtil
{
    const SERVER_NAME = "localhost";
    const USERNAME = "root";
    const PASSWORD = "978299";
    const DATABASE = "php-demo";

    public static function getConnection()
    {
        $connection = new PDO("mysql:host=" . self::SERVER_NAME . ";dbname=" . self::DATABASE, self::USERNAME,
            self::PASSWORD);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    }
}