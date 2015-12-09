<?php

namespace app\model;

use app\dao\DAO;

class Model {

    public function setData(array $attrs) {
        foreach ($attrs as $k => $attr):
            if (array_key_exists($k, $this->attrs)):
                $this->attrs[$k] = $attr;
            endif;
        endforeach;
    }

    public function __set($n, $v) {
        if (array_key_exists($n, $this->attrs)):
            $this->attrs[$n] = $v;
        endif;
    }

    public function __get($n) {
        if (array_key_exists($n, $this->attrs)):
            return $this->attrs[$n];
        endif;
    }

    public function getData() {
        return $this->attrs;
    }


}
