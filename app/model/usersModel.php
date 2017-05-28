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
    public   $str = '11234q';
    public function  getUser(){
       //http://medoo.in/api/select
        $datas = $this->select($this->table, ["user_email"],["id[>]" => 1]);
        return $datas;
    }
    
    public function  listUser(){

         $datas = $this->select($this->table, [
            "name",
            "email",
            "id"
        ]);
        return !empty($datas)? $datas : false; 
    }
    
    //检查用户是否存在
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
    
     //编辑角色
    public function  updateUser($id ,$updata=null){
        if($updata && $id){
            //执行编辑操作
            $data = $this->update($this->table, [
                "name" => $updata['name'],
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
                "email",
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
    
    

    //添加用户  //http://medoo.in/doc
    public function addUser($userinfo = array()){
        
        if(is_array($userinfo) && $userinfo){
            $date_time = date('Y-m-d H:i:s');
            $this->insert($this->table, [
               "name"       => !empty($userinfo['name']) ? $userinfo['name'] : 'anwz'. rand(10000, 99999),
                "password"  => sha1($this->str.$userinfo['password']),
                "email"     => $userinfo['email'],
                "updated_time" => $date_time,
                "created_time" => $date_time
                
            ]);
            $user_id = $this->id();
            return !empty($user_id) ? $user_id : false;
        }
        
        
    }
    
    
    
}

