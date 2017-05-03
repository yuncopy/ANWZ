<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace core\lib;
use core\lib\config as config;
class log
{
    
    /***
     * 1、确定存储方式
     * 2、写日志
     * 
     */
    public static $class;

    public static function init(){
        $drive = config::get('DRIVE', 'log');
        $class = '\core\lib\drive\log\\'.$drive;
        self::$class = new $class();
    }
    
    public static function  log($name){
       self::$class -> log($name);
    }
    
}
