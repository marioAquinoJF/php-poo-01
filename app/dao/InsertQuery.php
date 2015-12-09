<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\dao;

/**
 * Description of Insert
 *
 * @author Mario
 */
class InsertQuery {

    public static function get($table, $data) {
        
        $r = "INSERT INTO {$table} ";
        $r .= "(".implode(",", array_keys($data)) . ")";
        return $r . " VALUES('" . implode("','", array_values($data)) . "')";
        
    }

}
