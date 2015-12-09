<?php

namespace app\dao;

class ClientDAO extends DAO {

    public static $table = 'clients';

    public function __construct() {
    }

    public static function record($data) {
       return parent::rec(self::$table, $data, 'id');
    }
    
    public static function all($order) {
       return self::get(ClientDAO::$table, ['*'], $order, ['id'])->fetchAll(\PDO::FETCH_OBJ);
    }

}
