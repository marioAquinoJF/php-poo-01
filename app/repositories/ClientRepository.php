<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\repositories;

use app\model\Client;
use app\config\DB;
use app\db\Connection;

class ClientRepository {

    private function __construct() {
        
    }

    public static function all($order = 'asc') {
        Connection::open(DB::getPDO());
        return Client::all($order);
    }

    public static function find($id, $type) {
        Connection::open(DB::getPDO());
        return $type == 0 ? \app\model\PessoaFisica::find($id) : \app\model\PessoaJuridica::find($id);
    }

    public static function flush() {
        Connection::open(DB::getPDO());
        include_once '.\app\data\clients.php';
        PessoaFisicaRepository::populate($clientsData);
        PessoaJuridicaRepository::populate($clientsData);
    }

    

}
