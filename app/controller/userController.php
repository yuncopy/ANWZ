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
    public static  $_input_s;

    public function __construct() {
        if(!self::$userModel){ 
            self::$userModel = new usersModel ();
        }
       
        parent::__construct();
    }
   
     public function listAction(){
        
        $list = self::$userModel->listUser();
        if($list){
            $this->assign('list',$list);
        }
        $this->display('user/list.html');
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

