<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\controller;
use core\awz as awz; //导入基类


class  baseController  extends awz
{
    
    
    public function __construct() {
       
        $this->isLogin();  // 检查是否登录
        $this->getUser();  //分配用户名
        parent::__construct();
    }
    
    //用户是否登录
    public function  isLogin(){
        $user_id = awz::session()->get('user_id');
        if(!$user_id){
           redirect('/login/login');
        }
    }
    
    //获取用户名
    public function getUser(){
        $user_email = self::$_session->get("user_email");
        if($user_email){
            $this->assign('user_email',$user_email);
        }
        
    }




    /*
     * 封装json返回值，主要用于js ajax 和 后端交互返回格式
     * data:数据区 数组
     * msg: 此次操作简单提示信息
     * code: 状态码 200 表示成功，http 请求成功 状态码也是200
     */
    public function renderJSON($data=[], $msg ="succees", $code = 200){
        header('Content-type: application/json');//设置头部内容格式
        echo json_encode([
                "code" => $code,
                "msg"   =>  $msg,
                "data"  =>  $data,
                "req_id" =>  uniqid(),
        ]);exit;
    }
    
    
    
    
    
}

