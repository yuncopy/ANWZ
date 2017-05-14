<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controller;
use core\awz as awz; //导入基类
use app\model\usersModel;

class loginController extends awz
{
    
    public static  $userModel;
    public static  $_input_s;

    public function __construct() {
        if(!self::$userModel){ 
            self::$userModel = new usersModel ();
        }
       
        parent::__construct();
    }
   
        
    public function loginAction(){

        if(awz::input()->getMethod() == 'POST'){
             $email = awz::input()->getUsername('email',false);
             $password = awz::input()->get('password',false);
             if($email && $password){
                 //查询数据是否有用户存储
                $list = self::$userModel->userExist($email);
                if($list){
                    $dbpass = sha1((self::$userModel->str).$password);
                    if($dbpass == $list['password']){
                        //保存用户信息               
                        awz::session()->set("user_email", $list['email']);
                        awz::session()->set("user_id", $list['id']);
                        redirect('/index/index');
                        
                    }else{
                        awz::session()->setFlash('message', 'Password error');
                        redirect('/user/login');
                    }
                }else{
                    awz::session()->setFlash('message', 'The user does not exist');
                    redirect('/user/login');
                }
             }else{
                  awz::session()->setFlash("message", "Not fund data");
                  redirect('/user/login');
             }
        }else if(awz::input()->getMethod() == 'GET'){
            //显示登录见面
            $user_id = awz::session()->get('user_id');
            if(!$user_id){
                $this->display('user/login.html');
            }else if(strlen($user_id)){
                redirect('/index/index');
            }
        }
    }
    
    // 注册用户
    public function registerAction(){
        
        $data['name'] = $_GET['name'] ;
        $data['password'] = $_GET['password'] ;
        $data['email'] = $_GET['email'] ;
        self::$userModel->registerUser($data);
                
                //self::$userModel
        
    }
    
    //用户登出
    public function  logoutAction(){
        $is_out = awz::session()->destroy();
        if($is_out){
            awz::session()->setFlash("message", "Logout successfully");
            $this->display('user/login.html');
        }
    }
    
        
        
    
}

