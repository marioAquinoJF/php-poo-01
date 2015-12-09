<?php

namespace app\dao;

class AddressDao extends DAO {

    public static $table = 'address';

    public static function record($data) {
            return parent::rec(self::$table, $data, 'id');
    }

}
