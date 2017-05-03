<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//路由文件

namespace core\lib;
use core\lib\config as config;

class route
{
    
    public $controller;
    public  $action;
    public function __construct() 
    {
        // $host/index.php/index/index
        /**
         * 通过URL解析控制器，方法，参数
         * 1、隐藏index.php
         * 2、获取URL参数
         * 3、返回对象控制器和方法
         * */
        
        $uri  = trim($_SERVER['REQUEST_URI'],'/');
        if(!empty($uri) && $uri !='/'){
            $path_arr= explode('/', $uri);
            if(!empty($path_arr[0])){   // /index
                $this->controller =  $path_arr[0];
            }
            if(!empty($path_arr[1])){   // /index/index
                $this->action =  $path_arr[1];
            }else{
                $this->action =  config::get('ACTION', 'route');
            }
            
            //处理URL参数
            $h = 2;
            $count = count($path_arr) +  $h;
            while ($h < $count){
                if(isset($path_arr[$h+1])){
                    $_GET[$path_arr[$h]] = $path_arr[$h+1];
                }
                $h = $h + 2;
            }
        }else{
            $this->controller =  config::get('CONTROLLER', 'route');
             $this->action =  config::get('ACTION', 'route');
        }
        
      
    }
}

