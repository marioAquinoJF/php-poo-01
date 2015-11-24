<?php

require_once './model/Client.php';
require_once './model/PessoaFisica.php';
require_once './model/PessoaJuridica.php';

class ClientController {

    public function show($id) {

        $client = Client::find($id);
        include './views/showClient.php';
    }

    public static function namesList($order = 'asc') {
        $clients = Client::All($order);
        include_once './views/clientsList.php';
    }

}
