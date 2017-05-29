<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\controller;
use core\awz as awz; //导入基类
use app\model\accessModel;


class  baseController  extends awz
{
    
    public  $accessKey = 'allowaccess';
    public  $menukey = 'allowmenukey';
    public  $menukeyadmin = 'adminmenukey';
    
    public function __construct() {
      
        $this->isLogin();  // 检查是否登录
        $this->getUser();  //分配用户名
        $this->checkUserURL();  // 权限检查
        $this->getUserMenu();  // 获取菜单
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
     
    //检查当前用户权限
    public function checkUserURL(){
        
        //如果是超级管理员则无效检查
        
        $is_admin = awz::session()->get('is_admin');
        if($is_admin == 1){
            return true;
        }
        
        //获取当前访问的URL
        $route = new \core\lib\route();
        $controller = $route->controller;
        $action = $route->action;
        $httpURL = strtolower('/'.$controller.'/'.$action);  // 当前访问链接
        $allowURL = $this->getAccess();
        //dump($httpURL);
        //dump($allowURL);exit;
        if(!in_array($httpURL, $allowURL)){
           $this->display('error.html');exit;
        }
    }


   
    
    //获取当前用户的允许访问的链接
    public function getAccess(){
        $accessM = new accessModel();
        $user_id = awz::session()->get('user_id');
        // 缓存出来
        $allowAccess = array();
        $allowUserMenu = array();
        $keys = $this->accessKey;
        $json_access = awz::session()->get($keys);
        if($json_access){
            $allowAccess = json_decode($json_access,true);
        }else{
            $accessURL = $accessM->getUserAccess($user_id);
            if($accessURL){
                foreach ($accessURL as $key => $val){
                    $allowAccess[$val['id']] = strtolower($val['url']);
                    if($val['menu']== 1){  // 过滤是菜单的
                        $allowUserMenu[$key]['title'] = $val['title'];
                        $allowUserMenu[$key]['url'] = $val['url'];
                        $allowUserMenu[$key]['pid'] = $val['pid'];
                    }
                    //$allowUserMenu
                }
            }
            //dump($accessURL);
            if($allowUserMenu){
               $keys_menu=$this->menukey;
               awz::session()->set($keys_menu, json_encode($allowUserMenu)); 
            }
            if($allowAccess){
               awz::session()->set($keys, json_encode($allowAccess));
            }
            
        }
        return !empty($allowAccess) ? $allowAccess : false;  
    }
    
    //获取用户对应菜单菜单
    
     public function getUserMenu(){
        
        $is_admin = awz::session()->get('is_admin');
        if($is_admin == 1){  // 超级管理员
            $accessM = new accessModel();
            $menu_key_admin = $this->menukeyadmin;
            $json_menu = awz::session()->get($menu_key_admin);// 缓存处理
            if($json_menu){
                $allowMenu = json_decode($json_menu,true);
            }else{
                $allowMenu = $accessM->accessCate(true); 
                if($allowMenu){
                    awz::session()->set($menu_key_admin, json_encode($allowMenu));
                }
            }
        }else{
            $keys_menu = $this->menukey;//除了超级管理员
            $json_menu = awz::session()->get($keys_menu);
            $allowUserMenu = array();
            if($json_menu){
                $allowUserMenu = json_decode($json_menu,true);
            }
        }
        
        $allowMenuList = !empty($allowUserMenu) ? $allowUserMenu : $allowMenu;
       
        if($allowMenuList){
            foreach ($allowMenuList as $key =>&$vv){
               $vv['title'] = str_replace("|-----",'',$vv['title']);//处理一下超级管理员菜单
            }
            $this->assign('menulist',$allowMenuList);
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

