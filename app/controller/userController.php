<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controller;
use Joomla\Input;
use app\model\userModel;
class userController extends baseController
{
    
    
    public function loginAction(){
        
        if(self::$_input->getMethod() == 'POST'){
             $email = self::$_input->getUsername('email',false);
             $password = self::$_input->get('password',false);
             if($email && $password){
                 //查询数据是否有用户存储
                $user = new userModel ();
                $list = $user->userExist($email);
                dump($list);
               
             }
             
            
        }else if(self::$_input->getMethod() == 'GET'){
            //显示登录见面
            $this->display('user/login.html');
        }
        
    }
        
    
}

