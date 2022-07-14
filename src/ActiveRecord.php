<?php

namespace Post;

use PDO;

require_once('../vendor/autoload.php');


class ActiveRecord
{
    protected static $connection;

    protected static function connect()
    {

        if (!isset(self::$connection)) {
            $user = 'back';
            $password = '12345';
            $db = 'Mes';
            $host = 'localhost';
            try {
                $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
                self::$connection = $pdo;
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage();
                echo " не соединено с БД";
                die();
            }
        }
    }

    protected static function unsetConnect()
    {
        self::$connection = null;
    }
}