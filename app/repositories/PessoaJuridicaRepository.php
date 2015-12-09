<?php

namespace app\repositories;

use app\model\Address;
use app\model\Client;
use app\model\PessoaJuridica;

class PessoaJuridicaRepository {

    public static function create($data) {
        $c = new Client($data);
        $pj = new PessoaJuridica($c, $data);
        $pj->create();
        foreach ($data['address'] as $address) {
            $add = new Address($address);
            $add->client_id = $pj->client_id;
            $add->create();
        }
    }

    public static function populate($clientsData) {

        foreach ($clientsData as $client) {
            if ($client['type'] === 'Pessoa Jurídica'):
                self::create($client);
            endif;
        }
    }

}
