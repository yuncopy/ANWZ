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
    private  $table_user_role = 'user_role';
    
    
    public function  listRole(){
        
        $datas = $this->select($this->table, [
            "name",
            "descs",
            "id"
        ]);
        return !empty($datas)? $datas : false; 
        
    }
    
    //编辑角色
    public function  updateRole($id ,$updata=null){
        if($updata && $id){
            //执行编辑操作
            $data = $this->update($this->table, [
                "name" => $updata['name'],
                "descs" =>$updata['descs'],
                "status" =>$updata['status'],
                "updated_time"=>date('Y-m-d H:i:s')
            ], [
                "id[=]" => $id
            ]);
            return !empty($data) ? $data : false;
            
        }else if($id && !$updata){
            //查询单条记录
            $roleOne = $this->get($this->table, [
                "name",
                "descs",
                "status",
                "id"
            ], [
                "id" => $id
            ]);
            return !empty($roleOne) ? $roleOne : null;
        }else{
            return null;
        }
    }
    
    

        //注册用户  //http://medoo.in/doc
    public function addRole($roleinfo = array()){
        
        if(is_array($roleinfo) && $roleinfo){
            $date_time = date('Y-m-d H:i:s');
            $this->insert($this->table, [
                    "name" => $roleinfo['name'],
                    "descs" => $roleinfo['descs'],
                    "updated_time" => $date_time,
                    "created_time" => $date_time
                
            ]);
            $user_id = $this->id();
            return !empty($user_id) ? $user_id : false;
        }
        
        
    }
    
    
    public function  getUserRole($user_id=false){
         //SELECT * FROM role as r LEFT JOIN user_role as ur ON r.id=ur.role_id WHERE ur.uid=2
        if($user_id){
            $datas = $this->select($this->table, [
                        "[>]{$this->table_user_role}" => ["id" => "role_id"]
                    ],[
                        "{$this->table}.name",
                        "{$this->table}.id",
                    ],[
                        "{$this->table_user_role}.uid" => $user_id
                    ]);
            return !empty($datas) ? $datas : false;
        } 
    }
    
   
    
    
    
}

