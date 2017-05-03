<?php
//http://awz.m.com/

/**
 * 入口文件
 * 1、定义常量
 * 2、加载函数库
 * 3、启动框架
 * 
 * */
//定义常量  (兼容window  linux 系统)
define('AWZ',str_replace("\\","/",dirname(__FILE__)) );

define('CORE', AWZ.'/core');
define('APP',AWZ.'/app');
define('MODULE','app');

//引入composer自动加载类
include 'vendor/autoload.php';

//开启调试模式
define('DEBUG', true);
if(DEBUG){
    //第三方debug类库
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
    ini_set('display_error', 'On');
}else{
    ini_set('display_error', 'Off');
}

//加载函数库
include_once CORE.'/common/function.php';
//核心文件
include_once CORE.'/awz.php';

//当实例化类时，如果类不存在会触发此方法
spl_autoload_register('\core\awz::loads');  //当实例化时不存在的类时会执行awz::loads方法

//启动框架
\core\awz::run();













