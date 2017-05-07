<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace core\lib\drive\log;
use core\lib\config as config;
class file
{
    public $path;
    
    public function __construct() {
         $log_conf = config::get('OPTION','log');
         $this->path = $log_conf['PATH'];
    }

    public function  log($message,$file='log'){
       // var_dump($name);
        /**
         * 1、确定目录是否存在
         * 2、写入内容
         */
        $pathname = $this->path;
        if(!is_dir($pathname)|| !file_exists($pathname)){
            mkdir($pathname, '0777', true);
        }
        
        //写入日志
        return file_put_contents($pathname.$file.'_'.date('Y_m_d_H').'.php', '['.date('Y-m-d H:i:s') .'] '.json_encode($message).PHP_EOL , FILE_APPEND);
        
    }
}

