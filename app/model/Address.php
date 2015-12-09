<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\model;
use app\dao\AddressDao;
/**
 * Description of Adress
 *
 * @author Mario
 */
class Address extends Model {

    protected $attrs = ['id' => '', 'client_id' => '', 'address' => '', 'is_billing' => ''];
    
    public function __construct($attrs) {
        $this->setData($attrs);
    }

    public function all() {
        
    }

    public function find($id) {
        
    }
    public function create() {
            return AddressDao::record($this->getData());
    }

}
