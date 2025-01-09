<?php

/**
 * Database wrapper
 */
class Database
{

    private static PDO $connect;

    private static array $settings = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    );

    public static function connectTo(string $host, string $user, string $password, string $database): PDO
    {
        if (!isset(self::$connect)) {
            self::$connect = @new PDO(
                "mysql:host=$host;dbname=$database",
                $user,
                $password,
                self::$settings
            );
        }
        return self::$connect;
    }

    public static function query(string $sql, array $parameters = array()): PDOStatement
    {
        $query = self::$connect->prepare($sql);
        $query->execute($parameters);
        return $query;
    }
}
