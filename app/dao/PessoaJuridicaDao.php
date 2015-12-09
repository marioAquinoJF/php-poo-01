<?php

namespace app\dao;

class PessoaJuridicaDao extends DAO {

    private static $table = 'pessoas_juridicas';

    public static function record($data) {
        return parent::rec(self::$table, $data, 'client_id');
    }

    public static function get($id) {
        return parent::retrieve("SELECT c.id as id, c.id as client_id, c.name as name, c.type as type, "
                        . "pj.inscricao as inscricao, pj.cnpj as cnpj, "
                        . "ad.address as address, "
                        . "bl.address as billing "
                        . " FROM " . ( ClientDAO::$table ) . " c"
                        . " INNER JOIN " . self::$table . " pj on c.id = {$id} AND c.id = pj.client_id "
                        . " INNER JOIN " . ( AddressDao::$table ) . " ad on c.id = ad.client_id AND ad.is_billing = 0"
                        . " INNER JOIN " . ( AddressDao::$table ) . " bl on c.id = bl.client_id AND bl.is_billing = 1")->fetchAll();
    }
}
