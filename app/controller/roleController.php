<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controller;
use core\awz;
use app\model\roleModel;
use app\model\roleAccessModel;
use app\model\accessModel;

use Joomla\Input\Input as Input;


class roleController extends baseController
{
    
    public static  $roleModel;
    
    

    public function __construct() {
        if(!self::$roleModel){ 
            self::$roleModel = new roleModel ();
        }
        parent::__construct();
    }


    public function listAction(){
        
        $list = self::$roleModel->listRole();
        if($list){
            $this->assign('list',$list);
        }
        $this->display('role/list.html');
    }
    
    
    
     public function addAction(){
        $input = new Input();
        $Session = awz::session();
        if($input->getMethod() == 'POST'){
            $name = $input->getUsername('name',false);
            $descs = $input->getUsername('descs',false);
            if( $name && $descs ){
                $role_data['name']  = $name;
                $role_data['descs']  = $descs;
                $result = self::$roleModel->addRole($role_data);
                if($result){
                    $Session->setFlash("message", " Add successful");
                    redirect('/role/list');
                }else{
                    $Session->setFlash("message", " Add failure");
                    redirect('/role/add');
                }
            }else{
                $Session->setFlash("message", " Unable to get to the data");
                redirect('/role/add');
            }
        }
        $this->display('role/add.html');
    }
    
    
    //编辑操作
     public function editAction(){
        $input = new Input();
        $Session = awz::session();
        if($input->getMethod() == 'POST'){
            $name = $input->getUsername('name',false);
            $id = $input->get('id',false);
            $descs = $input->getUsername('descs',false);
            $status = $input->get('status',false);
            if( $name && $descs && $id){
                $role_data['name']  = $name;
                $role_data['descs']  = $descs;
                $role_data['status']  = !empty($status ) ? $status : 2 ;
                $result = self::$roleModel->updateRole($id,$role_data);
                if( $result){
                    $Session->setFlash("message", " Update successful");
                    redirect('/role/list');
                }else{
                    $Session->setFlash("message", " Update failure");
                    redirect('/role/edit/id/'.$id);
                }
            }else{
                $Session->setFlash("message", " Unable to get to the data");
                redirect('/role/add');
            }
        }else if($input->getMethod() == 'GET'){
            $id = !empty($_GET['id']) ? check_input($_GET['id']) : false;
            if($id){
                $role = self::$roleModel->updateRole($id);
                $this->assign('role',$role);
                $this->display('role/edit.html'); 
               
            }
        }
        
    }
    
    //编辑操作
     public function authAction(){
        $input = new Input();
        $Session = awz::session();
        $accessM = new accessModel();
        $roleAccessM = new roleAccessModel();
        if($input->getMethod() == 'POST'){
           
            $id = $input->get('id',false);
            $access_id = $input->get('access_id',false);
            if( $id && $access_id){
               
                    // 数据库中该用户的权限 
                    $access = $accessM->getRoleAccess($id);
                    $role_access_add = array();
                    $role_access_del= array();
                    $role_access =array();
                    if($access && $access_id){  // 之前存在权限 
                        $access_id_have = array_column( $access,'access_id' ); //当前角色权限    
                        $need_add_access = array_diff ( $access_id ,  $access_id_have );// 需要添加的权限 
                        if($need_add_access){
                            foreach ($need_add_access as $val){
                                $role_access_add['role_id'] = $id;
                                $role_access_add['access_id'] = $val;
                                $roleAccessM->addRoleAccess($role_access_add);
                            }
                        }
                        
                        //需要删除权限 
                        $need_del_access = array_diff ( $access_id_have ,$access_id );// 需要删除的权限 
                        if($need_del_access){
                            foreach ($need_del_access as $val){
                                $role_access_del['role_id'] = $id;
                                $role_access_del['access_id'] = $val;
                                $roleAccessM->delRoleAccess($role_access_del);
                            }
                        }
                        
                    }else if($access_id){
                          
                        //需要添加的权限    , 编辑（思路2：删除后添加）
                        if($access_id){
                            foreach ($access_id as $val){
                                $role_access['role_id'] = $id;
                                $role_access['access_id'] = $val;
                                $roleAccessM->addRoleAccess($role_access);
                            }
                        }
                        
                    }else if(!$access_id){  // 删除全部
                       $roleAccessM->delAllRoleAccess($id);
                    }
                  
                    $Session->setFlash("message", " Update successful");
                    redirect('/role/auth/id/'.$id);
                }else{
                    $Session->setFlash("message", " Unable to get to the data");
                    redirect('/role/auth/id/'.$id);
                }
          
            
            
            
        }else if($input->getMethod() == 'GET'){
            $id = !empty($_GET['id']) ? check_input($_GET['id']) : false;
            if($id){
                $role = self::$roleModel->updateRole($id);
                $accesslist = $accessM->accessCate();
                if($accesslist){
                    
                    $accessR = $accessM->getRoleAccess($id);
                    if($accessR){
                        $n_listAccess = array();
                        $access_id = array_column( $accessR,'access_id' ); //当前角色权限
  
                        foreach ($accesslist as $key => $vs){
                            if(in_array( $vs['id'], $access_id)){
                                $n_listAccess[$key]['checked'] = " checked=checked ";
                            }
                            $n_listAccess[$key]['title'] = $vs['title'];
                            $n_listAccess[$key]['id'] = $vs['id'];
                        }
                    }
                    $n_listAccess = !empty($n_listAccess) ? $n_listAccess : $accesslist;
                    
                    
                    $this->assign('accesslist', $n_listAccess);
                }
                $this->assign('role',$role);
                $this->display('role/auth.html'); 
               
            }
        }
        
    }
    
    
 
    
        
        
    
}

