<?php

namespace app\config;

trait DB {

    public static $data = [
        'host' => 'localhost',
        'dbname' => 'curso_poo',
        'username' => 'root',
        'password' => ''];

    private function __construct() {
        
    }

    public static function getPDO($sgdbName = 'mysql') {
        switch ($sgdbName) {

            default:
                return new \PDO("{$sgdbName}:host=" . self::$data['host'] . ";dbname=" . self::$data['dbname'], self::$data['username'], self::$data['password']);
        }
    }

}
