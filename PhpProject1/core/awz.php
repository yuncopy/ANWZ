<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace core;
class awz
{
    public static  $classMap =array();
    public $assign;
    
    public function __construct() {
        
    }

    //启动框架的方法
    public static function run()
   {
       
        //根据URL加载对应的类文件
        $route = new \core\lib\route();
        $controller = $route->controller;
        $action = $route->action;
        $controller_file = APP.'/controller/'.$controller.'Controller.php';
        if(is_file($controller_file) && file_exists($controller_file)){
            include_once $controller_file;
            $class_name = '\\'.MODULE.'\controller\\'.$controller.'Controller';
            $class_controller = new $class_name(); //实例化通过URL解析的类
            $class_action = $action.'Action';  //拼接方法
            if(method_exists($class_controller, $class_action)){ 
                $class_controller -> $class_action(); //使用类中方法
            }else{
                throw new \Exception(sprintf('The required method "%s" does not exist for %s', $class_action, get_class($class_controller))); 
            }
        }else{
            throw new \Exception('Not Find Controller : '.$controller_file);
        }
        //启动日志类
        \core\lib\log::init();
        \core\lib\log::log('111');
        
    }
    
    //自动加载类库
    public static function loads($class)
    {
       // 自动加载类库
       /**
        * 实例化类时我们要把类文件包含进来才能进行实例化对象
        * 实例化对象方式        new \core\route();
        * 包含类文件路径        $class = ROOT./core/route.php
        * 导入文件              include ($class);
        */
        if(isset(self::$classMap[$class])){
            return true;
        }else{
            $classed = str_replace('\\', '/', $class);
            $class_path = AWZ.'/'.$classed.'.php';
            if(file_exists($class_path)&& is_file($class_path)){
                include  $class_path;
                self::$classMap[$class] = $class_path; //性能考虑
            }else{
                return false;
            }
        }
    }
 
    //分配数据到前台
    public function assign($key,$value)
    {
        if($key && $value){
            $this->assign[$key] = $value;
        }else{
            throw new \Exception('Not Key Or Value');
        }
    }
    
    //显示试图文件
    public function display($file)
    {
        /*
        $file_path = APP.'/view/'.$file;
        if(is_file($file_path) && file_exists($file_path)){
            extract($this->assign);
            include_once $file_path;
        }else{
            throw new \Exception('Not Find View File : '.$file_path);
        }
         */
        
        $file_path = APP.'/view/'.$file;
        if(is_file($file_path) && file_exists($file_path)){
            $view_dir = APP.'/view';
            $view_cache_dir = AWZ.'/cache/view';
            $loader = new \Twig_Loader_Filesystem($view_dir);
            $twig = new \Twig_Environment($loader, array(
                'cache' => $view_cache_dir,
                'debug'=> true
            ));
            $template = $twig->loadTemplate($file);
            $template->display($this->assign? $this->assign : array());
            
        }else{
            throw new \Exception('Not Find View File : '.$file_path);
        }
    }
    
        
        
        
    
}
