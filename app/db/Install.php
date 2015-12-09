<?php

namespace app\db;

use app\config\DB;
use app\db\Connection;

class Install {

    public static function run() {

        try {
            if (Connection::createDB(DB::$data) !== FALSE):
                self::createTables();
            endif;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function createTables() {
        include_once '.\app\data\dbInstall.php';
        Connection::open(DB::getPDO());
        foreach ($squeme as $stmt) {
            if (Connection::get()->exec($stmt) !== FALSE):
                echo $stmt . '<br/>';
            endif;
        }
        Connection::close();
    }

}
