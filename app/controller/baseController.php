<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\controller;
use core\awz as awz; //导入基类
use Joomla\Input;

class  baseController  extends awz
{
    
    public static $_input;
    public function __construct() {
        if(!self::$_input){
            self::$_input = new Input\Input;
        }
        parent::__construct();
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

