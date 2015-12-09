<?php

namespace app\dao;

class PessoaFisicaDao extends DAO {

    private static $table = 'pessoas_fisicas';

    public static function record($data) {
        return parent::rec(self::$table, $data, 'client_id');
    }

    public static function get($id) {
        return parent::retrieve("SELECT c.id as id, c.id as client_id, c.name as name, c.type as type, "
                        . "pf.rg as rg, pf.cpf as cpf, pf.age as age, "
                        . "ad.address as address"
                        . " FROM " . ( ClientDAO::$table ) . " c"
                        . " INNER JOIN " . self::$table . " pf on c.id = {$id} AND c.id = pf.client_id "
                        . " INNER JOIN " . ( AddressDao::$table ) . " ad on c.id = ad.client_id ")->fetchAll();
    }

}
