<?php

namespace app\model;
use app\dao\ClientDAO;

class Client extends Model {

    protected $attrs = ['id'=>'', 'name'=>'', 'type'=>''];
    private $dao;
    
    public static $types = ['Pessoa Fisica', 'Pessoa Jurídica'];

    public function __construct($data) {
        $this->setData($data);
        $this->dao = new ClientDAO();
    }

    public function save() {
        $this->attrs['id'] = ClientDAO::record($this->attrs)['id'];
        return $this->attrs['id']; 
    }

    public static function all($order) {
       return ClientDAO::all($order);
    }

    public function find($id) {
        
    }

}
