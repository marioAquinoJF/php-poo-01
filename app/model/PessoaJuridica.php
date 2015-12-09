<?php

namespace app\model;

use app\dao\PessoaJuridicaDao;

class PessoaJuridica extends Model {

    private $client,
            $address,
            $billing;
    protected $attrs = ['client_id' => '', 'cnpj' => '', 'inscricao' => ''];

    public function __construct(Client $client, $attrs) {
        $this->setData($attrs);
        $this->dao = new PessoaJuridicaDao();
        $this->client = $client;
    }

    public function getGrauDeImportancia() {
        if (strstr($this->getBilling()->address, "SP")):
            return 'Cliente Platina';
        elseif (strstr($this->getBilling()->address, "RJ")):
            return 'Cliente Ouro';
        endif;
        return 'Cliente Prata';
    }


    public function create() {
        $this->client->type = 1;
        $this->client->save();
        if ($this->client->id):
            $this->attrs['client_id'] = $this->client->id;
            return PessoaJuridicaDao::record($this->getData());
        endif;
    }

    public function all() {
        
    }

    public static function find($id) {
        $d = PessoaJuridicaDao::get($id)[0];
        $c = new Client($d);
        $pj = new PessoaJuridica($c, $d);
        $a = new Address(['address'=>$d['address']]);
        $pj->setAddress($a);
        $b = new Address(['address'=>$d['billing']]);
        $pj->setBilling($b);
        return $pj;
    }

    public function getAdress() {
        
    }

    public function setAddress(Address $address) {
        $this->address = $address;
    }

    public function setBilling(Address $billing) {
        $this->billing = $billing;
    }
    public function getClient() {
        return $this->client;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getBilling() {
        return $this->billing;
    }



}
