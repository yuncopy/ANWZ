<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controller;
use app\model\usersModel;
class userController extends baseController
{
    
    public static  $userModel;


    public function __construct() {
        if(!self::$userModel){ 
            self::$userModel = new usersModel ();
        }
        parent::__construct();
    }


    
    public function loginAction(){

        if(self::$_input->getMethod() == 'POST'){
             $email = self::$_input->getUsername('email',false);
             $password = self::$_input->get('password',false);
             if($email && $password){
                 //查询数据是否有用户存储
                $list = self::$userModel->userExist($email);
                if($list){
                    $dbpass = sha1((self::$userModel->str).$password);
                    if($dbpass == $list['password']){
                        //保存用户信息               
                        self::$_session->set("user_email", $list['email']);
                        self::$_session->set("user_id", $list['id']);
                        redirect('/index/index');
                        
                    }else{
                        self::$_session->setFlash('message', 'password error');
                        redirect('/user/login');
                    }
                }else{
                    self::$_session->setFlash('message', 'The user does not exist');
                    redirect('/user/login');
                }
             }else{
                  self::$_session->setFlash("message", "not fund data");
                  redirect('/user/login');
             }
        }else if(self::$_input->getMethod() == 'GET'){
            //显示登录见面
            $user_id = self::$_session->get('user_id');
            if(strlen($user_id) > 0){
               redirect('/index/index');
            }
            $this->display('user/login.html');
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
    
        
        
    
}

