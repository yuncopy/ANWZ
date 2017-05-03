<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace core\lib;
use core\lib\config as config;
use Medoo\Medoo as medoo;
class model extends medoo
{
    public function __construct() {

        $database = config::getAll( 'database');
        try{
            parent::__construct($database);
        }catch (\PDOException $e){
            die($e->getMessage());
        }
        
    }
    
}

