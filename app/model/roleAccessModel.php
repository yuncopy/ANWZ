<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\model;
use \core\lib\model as model;

class roleAccessModel extends model
{
    private  $table = 'role_access';
    
    
    public function  addRoleAccess($roleAccess=false){
        
        if(is_array($roleAccess) && $roleAccess){
            $date_time = date('Y-m-d H:i:s');
            $this->insert($this->table, [
                    "role_id" => $roleAccess['role_id'],
                    "access_id" => $roleAccess['access_id'],
                    "created_time" => $date_time
                
            ]);
            $rid = $this->id();
            return !empty($rid) ? $rid : false;
        } 
    }
    
    
    public function  delRoleAccess($roleAccess=false){
        
        if(is_array($roleAccess) && $roleAccess){
            $data = $this->delete($this->table, [
                    "AND" => [
                        "role_id"     => $roleAccess['role_id'],
                        "access_id"   => $roleAccess['access_id']
                    ]
            ]);
            return !empty($data) ? $data : false;
        } 
    }
    
    
    public function  delAllRoleAccess($role_id=false){
        
        if($role_id){
            $data = $this->delete($this->table, [
                "AND" => [
                    "role_id"       => $role_id
                ]
            ]);
            return !empty($data) ? $data : false;
        } 
    }
    
  
 
    
}
