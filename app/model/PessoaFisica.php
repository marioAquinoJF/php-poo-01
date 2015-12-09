<?php

namespace app\model;

use app\dao\PessoaFisicaDao;

class PessoaFisica extends Model {

    protected $attrs = [ 'client_id' => '', 'cpf' => '', 'rg' => '', 'age' => ''];
    private $client,
            $address,
            $dao;

    public function __construct(Client $client, $attrs) {
        $this->setData($attrs);
        $this->dao = new PessoaFisicaDao();
        $this->client = $client;
    }

    public function getGrauDeImportancia() {
        
        if ($this->attrs['age'] > 40):
            return 'Cliente Platina';
        elseif ($this->attrs['age'] > 30):
            return 'Cliente Ouro';
        endif;

        return 'Cliente Prata';
    }

    public function create() {
        $this->client->type = 0;
        $this->client->save();
        if ($this->client->id):
            $this->attrs['client_id'] = $this->client->id;
            return PessoaFisicaDao::record($this->getData());
        endif;
    }

    public static function find($id) {
        $d = PessoaFisicaDao::get($id)[0];
        $c = new Client($d);
        $pf = new PessoaFisica($c, $d);
        $a = new Address(['address'=>$d['address']]);
        $pf->setAddress($a);
        return $pf;
    }

    public function getBilling() {
        return $this->address;
    }

    public function getAddress() {
        return $this->address;
    }
    public function getClient() {
        return $this->client;
    }
    public function setAddress(Address $address) {
        $this->address = $address;
    }



}
