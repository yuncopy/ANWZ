<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\model;
use \core\lib\model as model;

class userRoleModel extends model
{
    private  $table = 'user_role';
    
    
    public function  addUserRole($userRole=false){
        
        if(is_array($userRole) && $userRole){
            $date_time = date('Y-m-d H:i:s');
            $this->insert($this->table, [
                    "uid" => $userRole['uid'],
                    "role_id" => $userRole['role_id'],
                    "created_time" => $date_time
                
            ]);
            $rid = $this->id();
            return !empty($rid) ? $rid : false;
        } 
    }
    
    
    public function  delUserRole($userRole=false){
        
        if(is_array($userRole) && $userRole){
            $data = $this->delete($this->table, [
                    "AND" => [
                        "uid"       => $userRole['uid'],
                        "role_id"   => $userRole['role_id']
                    ]
            ]);
            return !empty($rid) ? $rid : false;
        } 
    }
    
    
    public function  delAllUserRole($user_id=false){
        
        if($user_id){
            $data = $this->delete($this->table, [
                "AND" => [
                    "uid"       => $user_id
                ]
            ]);
            return !empty($data) ? $data : false;
        } 
    }
    
  
 
    
}
