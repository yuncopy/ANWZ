<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controller;
use app\model\usersModel;
use app\model\roleModel;
use app\model\userRoleModel;
use core\awz;
use Joomla\Input\Input as Input;

class userController extends baseController
{
    
    public static  $userModel;
    public static  $_input_s;

    public function __construct() {
        if(!self::$userModel){ 
            self::$userModel = new usersModel ();
        }
       
        parent::__construct();
    }
   
     public function listAction(){
        
        $list = self::$userModel->listUser();
        $userRole = new roleModel();
       
       // 

        if($list){
            $new_list = array();
            $role_name = null;
            foreach ( $list as $key => $val){
                $role = $userRole->getUserRole($val['id']);
                if($role){
                    $role_name = array_column( $role,'name' );
                    $new_list[$key]['role_name']= implode(' , ', $role_name);
                }
                $new_list[$key]['id']=$val['id'];
                $new_list[$key]['email']=$val['email'];
                $new_list[$key]['name']=$val['name'];
                
            }
            
            $this->assign('list',$new_list);
        }
        $this->display('user/list.html');
    }
  
    // 执行添加用户操作
    public function addAction(){
        $input = new Input();
        $Session = awz::session();
        if($input->getMethod() == 'POST'){
            $name = $input->getUsername('name',false);
            $password = $input->get('password',false);
            $repassword = $input->get('repassword',false);
            $email = $input->getUsername('email',false);

            if( $name && $password && $email){
               
                
                // 验证密码是否一致
                if($password && $repassword){
                    if($password !== $repassword){
                        $Session->setFlash("message", " Add password and repassword not same");
                        redirect('/user/add');
                    }
                }else{
                    $Session->setFlash("message", " Add failure ,password or repassword cant not empty !");
                    redirect('/user/add');
                }
                 // 检查电邮地址语法是否有

                if (!preg_match("/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i",$email)) {
                    $Session->setFlash("message", " Add failure ,Invalid email format");
                    redirect('/user/add');
                }else{
                    $email_exist = self::$userModel->userExist($email);
                    if($email_exist){
                        $Session->setFlash("message", " Add failure , Email exist");
                        redirect('/user/add');
                    }
                }
                
                $user_data['name']  = $name;
                $user_data['email']  = $email;
                $user_data['password']  = $password;
               
                $result = self::$userModel->addUser($user_data);
                if($result){
                    $Session->setFlash("message", " Add successful");
                    redirect('/user/list');
                }else{
                    $Session->setFlash("message", " Add failure");
                    redirect('/user/add');
                }
            }else{
                $Session->setFlash("message", " Unable to get to the data");
                redirect('/user/add');
            }
        }
        $this->display('user/add.html');
    }
    
    
    //编辑操作
     public function editAction(){
        $input = new Input();
        $Session = awz::session();
        if($input->getMethod() == 'POST'){
            $id = $input->get('id',false);
            $name = $input->getUsername('name',false);
            $email = $input->get('email',false);
            $status = $input->get('status',false);
            if( $name && $email && $id){
                $user_data['name']  = $name;
                $user_data['email']  = $email;
                $user_data['status']  = !empty($status ) ? $status : 2 ;
                $result = self::$userModel->updateUser($id,$user_data);
                if( $result){   // 修改用户成功，则接下来要保存用户和角色之间关系
                    
                    $userRole = new userRoleModel();
                    $user_role = array();
                    $user_role_add = array();
                    $user_role_del = array();
                    $role_id = $input->getUsername('roleid',false);// 选中的角色ID
                    
                    // 数据库中该用户的角色
                    $roleModel = new roleModel ();
                    $role = $roleModel->getUserRole($id);
                    if($role && $role_id){  // 之前存在角色
                        $role_id_have = array_column( $role,'id' ); //当前用户角色   
                        $need_add_role = array_diff ( $role_id ,  $role_id_have );// 需要添加的角色
                        if($need_add_role){
                            foreach ($need_add_role as $val){
                                $user_role_add['uid'] = $id;
                                $user_role_add['role_id'] = $val;
                                $userRole->addUserRole($user_role_add);
                            }
                        }
                        
                        //需要删除角色
                        $need_del_role = array_diff ( $role_id_have ,$role_id );// 需要删除的角色
                         if($need_del_role){
                            foreach ($need_del_role as $val){
                                $user_role_del['uid'] = $id;
                                $user_role_del['role_id'] = $val;
                                $userRole->delUserRole($user_role_del);
                            }
                        }
                        
                    }else if($role_id){
                          
                        //需要添加的角色    , 编辑（思路2：删除后添加）
                        if($role_id){
                            foreach ($role_id as $val){
                                $user_role['uid'] = $id;
                                $user_role['role_id'] = $val;
                                $userRole->addUserRole($user_role);
                            }
                        }
                        
                    }else if(!$role_id){  // 删除全部
                       $userRole->delAllUserRole($id);
                    }
                  
                    $Session->setFlash("message", " Update successful");
                    redirect('/user/list');
                }else{
                    $Session->setFlash("message", " Update failure");
                    redirect('/user/edit/id/'.$id);
                }
            }else{
                $Session->setFlash("message", " Unable to get to the data");
                redirect('/user/add');
            }
        }else if($input->getMethod() == 'GET'){
            $id = !empty($_GET['id']) ? check_input($_GET['id']) : false;
            if($id){
                $user = self::$userModel->updateUser($id);
                //获取角色信息
                $roleModel = new roleModel ();
                $listRole = $roleModel->listRole();//角色列表
                if($listRole){
                    $role = $roleModel->getUserRole($id);
                    if($role){
                        $n_listRole = array();
                        $role_id = array_column( $role,'id' ); //当前用户角色
                        $checked = null;
                        foreach ($listRole as $key => $vs){
                            if(in_array( $vs['id'], $role_id)){
                                $n_listRole[$key]['checked'] = " checked=checked ";
                            }
                            $n_listRole[$key]['name'] = $vs['name'];
                            $n_listRole[$key]['descs'] = $vs['descs'];
                            $n_listRole[$key]['id'] = $vs['id'];
                        }
                    }
                    $n_listRole = !empty($n_listRole) ? $n_listRole : $listRole;
                }
                
                $this->assign('user',$user);
                $this->assign('listRole',$n_listRole);
                $this->display('user/edit.html'); 
               
            }
        }
        
    }
    
  
    
            
}

