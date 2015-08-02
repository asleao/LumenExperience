<?php

namespace App\Models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmployeeType
 *
 * @author aleao
 */
class EmployeeType {

    public static function getType($name = null){
        
        $types = ['SALESMAN','MANAGER','STOCKER'];
        
        if($name === null){
            return $types;
        }
        
        if(isset($types[$name])){
            return $name;
        }
    }
}
