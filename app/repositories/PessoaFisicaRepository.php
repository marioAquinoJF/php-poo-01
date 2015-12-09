<?php

namespace app\repositories;

use app\model\Address;
use app\model\Client;
use app\model\PessoaFisica;

class PessoaFisicaRepository {

    public static function create($data) {
        $c = new Client($data);
        $pf = new PessoaFisica($c, $data);   
        $pf->create();
        $address = new Address($data['address']);
        $address->client_id = $pf->client_id;
        $address->create();        
    }

    public static function populate($clientsData) {       

        foreach ($clientsData as $client) {
            if ($client['type'] === 'Pessoa Física'):
                self::create($client);
            endif;
        }
    }

}
