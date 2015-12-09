<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\db;

class Connection {

    private static $conn;

    private function __construct() {
        
    }

    public static function open(\PDO $conn) {
        self::$conn = $conn;
        self::$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public static function get() {
        return self::$conn;
    }

    public static function close() {
        self::$conn = null;
    }
    public static function createDB($data) {
        $dbh = new \PDO("mysql:host={$data['host']}", $data['username'], $data['password']);
        return $dbh->exec("CREATE DATABASE {$data['dbname']};
                CREATE USER '{$data['username']}'@'{$data['host']}' IDENTIFIED BY '{$data['password']}';
                GRANT ALL ON {$data['dbname']}.* TO '{$data['username']}'@'{$data['host']}';
                FLUSH PRIVILEGES;");
    }
    
    
}
