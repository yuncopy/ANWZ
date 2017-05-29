<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\model;
use \core\lib\model as model;

class accessModel extends model
{
    private  $table = 'access';
    public   $table_role_access = 'role_access';
    private  $table_role = 'role';
    public   $table_user_role = 'user_role';
    
    
   //添加权限  //http://medoo.in/doc
    public function addAccess($accessinfo = array()){
        
        if(is_array($accessinfo) && $accessinfo){
            $date_time = date('Y-m-d H:i:s');
            $this->insert($this->table, [
                "title"    => $accessinfo['title'],
                "url"      => $accessinfo['url'],
                "menu"     => $accessinfo['menu'],
                "pid"      => $accessinfo['pid'],
                "path"     => $accessinfo['path'],
                "updated_time" => $date_time,
                "created_time" => $date_time
                
            ]);
            $access_id = $this->id();
            return !empty($access_id) ? $access_id : false;
        }  
    }
    
    public function  updateOne($update_data=false,$id=false){
        
        if($update_data && $id){
            //执行编辑操作
            $data = $this->update($this->table, [
                "title" =>  $update_data['title'],
                "url"   =>  $update_data['url'],
                "menu"   =>  $update_data['menu'],
                "updated_time"=>date('Y-m-d H:i:s')
            ], [
                "id[=]" => $id
            ]);
        }
        return !empty($data) ? $data : false;
    }

        //获取父类信息
    public function  accessFind($pid = null){
        if(is_string($pid) && $pid){
            $datas = $this->get($this->table, [
                "id",
                "path"
            ], [
                "id[=]" => $pid
            ]);
            return !empty($datas)? $datas : false;
        }
        
    }
    
    
    //检查URL是否存在
    public function  checkURL($url = null){
        if(is_string($url) && $url){
            $datas = $this->get($this->table, [
                "url",
                "id"
            ], [
                "url[=]" => $url
            ]);
            return !empty($datas)? $datas : false;
        }
    }
    
    //查询
    public function  accessCate($menu= false){
         //遍历数组
        $sql = "select id , pid , url , menu ,path , title , status , concat(path ,',',id) as path_id from ".$this->table." order by path_id";
        // 获取菜单
        if($menu==true){
           $sql = "select id , pid , url , menu ,path , title , status , concat(path ,',',id) as path_id from ".$this->table." where  menu=1  order by path_id";  
        }
        
        $cates = $this->query($sql)->fetchAll();
        foreach ($cates as $key => &$value) {
            //判断当前的分类是几级分类
            $tmp = count(explode(',', $value['path'])) - 1;
            $prefix = str_repeat('|-----', $tmp);
            $value['title'] = $prefix . $value['title'];
            $value['menu'] = $value['menu']== 1 ? '[菜单]' : '(URL)' ;
        }
        return !empty($cates) ? $cates : false;
    }
    

     //获取单条权限信息
    public function  findOne($id = null){
        if(is_string($id) && $id){
            $datas = $this->get($this->table, [
                "id",
                "url",
                "title",
                "menu"
            ], [
                "id[=]" => $id
            ]);
            return !empty($datas)? $datas : false;
        }
        
    }  
    
    public function  getRoleAccess($role_id=false){
         //SELECT * FROM role as r LEFT JOIN role_access as ra ON r.id=ra.role_id WHERE ra.role_id=2
        if($role_id){
            $datas = $this->select($this->table_role, [
                        "[>]{$this->table_role_access}" => ["id" => "role_id"]
                    ],[
                        "{$this->table_role}.name",
                        "{$this->table_role_access}.access_id",
                    ],[
                        "{$this->table_role_access}.role_id" => $role_id
                    ]);
            return !empty($datas) ? $datas : false;
        } 
    }
    
    public function  getUserAccess($user_id=false){
         /**
          *     //分表查询
          *     SELECT * FROM user_role WHERE uid=2
          *     SELECT * FROM role_access WHERE role_id in (1,3,4);
          *     SELECT * FROM access WHERE id in (1,2,3,6);
          *     
          *     联合查询
          *     SELECT * FROM role_access as r LEFT JOIN  access as a ON a.id=r.access_id  
          *             LEFT JOIN user_role as ur ON ur.role_id = r.role_id WHERE ur.uid=2
          */
        if($user_id){
            $datas = $this->select($this->table_role_access, [
                        "[>]{$this->table}" => ["access_id" => "id"],
                        "[>]{$this->table_user_role}" => ["role_id" => "role_id"]
                    ],[
                        "{$this->table}.url",
                        "{$this->table}.id",
                        "{$this->table}.menu",
                        "{$this->table}.title",
                        "{$this->table}.pid"
                    ],[
                        "{$this->table_user_role}.uid" => $user_id
                    ]);
            return !empty($datas) ? $datas : false;
        } 
    }
     
    
}

