<?php

namespace app\model;

abstract class Client {

    protected $props ;

    public function __construct($dataClient) {
        $this->props = $dataClient;
    }

    public function __set($name, $value) {
        if (key_exists($name, $this->props)) {
            $this->props[$name] = $value;
        }
    }

    public function __get($name) {
        if (key_exists($name, $this->props) && $name !== 'endereco') {
            return $this->props[$name];
        }
    }

    public function getData() {
        return $this->props;
    }

    public static function All($order = 'asc') {
        include '/../data/clients.php';
        if ($order === 'desc'):
            usort(
                    $clients, function( $a, $b ) {
                return ($a->id < $b->id );
            }
            );
        endif;
        return $clients;
    }

    public static function find($cli_id) {
        include '/../data/clients.php';
        foreach ($clients as $client) {
            if ($client->id == $cli_id):
                return $client;
            endif;
        }
        return;
    }

    abstract public function getGrauDeImportancia();

    abstract public function getEndereco();
}
