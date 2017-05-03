<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace core\lib;

class config 
{
    public static $conf = array(); //经常使用所以配置成静态属性
    
    public static function  get($name,$file)
    {
        /**
         * 1、判断文件是否存在
         * 2、判断配置是否存在
         * 3、缓存配置
         * **/
        if(isset(self::$conf[$file])){
            return self::$conf[$file][$name];
        }else{
            $config_path = CORE.'/config/'.$file.'.php';
            if(is_file($config_path)&& file_exists($config_path)){
                $conf = include_once $config_path;
                if(isset($conf[$name])){
                    self::$conf[$file] =  $conf;
                    return $conf[$name];
                }else{
                    throw new \Exception('Not Find Config Option: '.$name);
                }
            }else{
                throw new \Exception('Not Find Config File : '.$config_path);
            }
        }
  
    }
    /***
     * 加载配置文件
     * **/
    public static function  getAll($file){
        if(isset(self::$conf[$file])){
            return self::$conf[$file];
        }else{
            $config_path = CORE.'/config/'.$file.'.php';
            if(is_file($config_path)&& file_exists($config_path)){
                $conf = include_once $config_path;
                self::$conf[$file] =  $conf;
                return $conf;
            }else{
                throw new \Exception('Not Find Config File : '.$config_path);
            }
        }
         
    }
    
}

