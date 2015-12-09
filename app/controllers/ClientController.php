<?php

namespace app\controllers;

use app\repositories\ClientRepository;
 
class ClientController {
    
    public function __construct() {
        
    }

    public function show($data) {
        $client = ClientRepository::find($data['id'], $data['type']);
        include '/../views/showClient.php';
    }

    public static function clientList($order) {        
        $clients = ClientRepository::All($order);
        include_once './app/views/clientsList.php';
    }

    public static function flush() {
       return ClientRepository::flush();
    }

}
