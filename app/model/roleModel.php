<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\model;
use \core\lib\model as model;

class roleModel extends model
{
    private  $table = 'role';
 
    
    public function  userExist($user_email = null){
        if(is_string($user_email) && $user_email){
            $datas = $this->select($this->table, [
                "email",
                "password",
                "id",
                "name"
            ], [
                "email[=]" => $user_email
            ]);
            return !empty($datas)? $datas[0] : false;
        }
        
    }
     
    //注册用户  //http://medoo.in/doc
    public function registerUser($userinfo = array()){
        
        if(is_array($userinfo) && $userinfo){
            $date_time = date('Y-m-d H:i:s');
            $this->insert($this->table, [
                    "name" => !empty($userinfo['name']) ? $userinfo['name'] : 'anwz'. rand(10000, 99999),
                    "password" => sha1($this->str.$userinfo['password']),
                    "email" => $userinfo['email'],
                    "updated_time" => $date_time,
                    "created_time" => $date_time
                
            ]);
            $user_id = $this->id();
        }
        
        
    }
    
    
    
}

