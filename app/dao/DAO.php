<?php

namespace app\dao;

use app\db\Connection;

abstract class DAO {

    protected static function rec($table, $data, $fieldIdName) {
        if (Connection::get()->exec(InsertQuery::get($table, $data))):
            return Connection::get()->query("SELECT {$fieldIdName} FROM {$table} ORDER BY {$fieldIdName} DESC LIMIT 1")->fetch(\PDO::FETCH_ASSOC);
        endif;
        return FALSE;
    }

    protected static function get($table, $fields = ['*'], $order = 'asc', $orderFields = [], $limit = '') {

        return self::retrieve(
                        "SELECT " . implode(", ", $fields)
                        . " FROM {$table}"
                        . (count($orderFields) > 0 ? " ORDER BY " . implode(", ", $orderFields) . " {$order} " : "")
                        . ($limit ? " LIMIT 1" : "")
        );
    }

    public static function retrieve($query){
        return Connection::get()->query($query);
    }

    abstract public static function record($data);

}
