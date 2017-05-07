<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\model;
use \core\lib\model as model;

class usersModel extends model
{
    private  $table = 'users';
    public function  getUser(){
       //http://medoo.in/api/select
        $datas = $this->select($this->table, ["user_email"],["id[>]" => 1]);
       
        return $datas;
        
    }
    
}

