<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controller;
use app\model\accessModel;
use core\awz;
use Joomla\Input\Input as Input;

class accessController extends baseController
{
    
   
    public function __construct() {
 
        parent::__construct();
    }
   
     public function listAction(){
        $access = new accessModel();
        $accesslist = $access->accessCate();
        $this->assign('accesslist', $accesslist);
        $this->display('access/list.html');
    }
  
    // 执行添加用户操作
    public function addAction(){
        
        $input = new Input();
        $Session = awz::session();
        $access = new accessModel();
        if($input->getMethod() == 'POST'){
            $title = $input->getUsername('title',false);
            $pid = $input->get('pid',0);
            $url = $input->getUsername('url',false);
            $menu = $input->get('menu',false);
            
            if( $title  && $url){
                
                //检查URL是否存在
                $url_exist = $access->checkURL($url);
                if($url_exist){
                    $Session->setFlash("message", " Add failure , Email exist");
                    redirect('/access/add');
                }
                
                
                $access_data['title'] = $title;
                $access_data['pid'] = intval($pid);
                $access_data['url'] = $url;
                $access_data['menu'] = $menu;
                if($pid == 0){
                    $path = 0;
                }else{
                    //读取父级分类的信息
                    $pid_info = $access->accessFind($pid);
                    $path = $pid_info['path'].','.$pid_info['id'];
                }
                $access_data['path'] = $path;
                $result = $access->addAccess($access_data);
                
                if($result){
                    $Session->setFlash("message", " Add successful");
                    redirect('/access/list');
                }else{
                    $Session->setFlash("message", " Add failure");
                    redirect('/access/add');
                }
               
            }else{
                $Session->setFlash("message", " Unable to get to the data");
                redirect('/access/add');
            }
        }else{
            $accesslist = $access->accessCate();
            $this->assign('accesslist', $accesslist);
            $this->display('access/add.html');
        }
      
    }
    
    
    //编辑操作
    public function editAction(){
        $input = new Input();
        $Session = awz::session();
        $access = new accessModel();
        if($input->getMethod() == 'POST'){
            $id = $input->get('id',false);
            $title = $input->getUsername('title',false);
            $url = $input->getUsername('url',false);
            $menu = $input->get('menu',false);
            if( $id && $url ){
                $update_data['title'] =  $title;
                $update_data['url'] =  $url;
                $update_data['menu'] =  $menu;
                $res = $access->updateOne($update_data,$id);
                if($res){
                    $Session->setFlash("message", " Update successful");
                    redirect('/access/list');
                }else{
                    $Session->setFlash("message", " Update failure");
                    redirect('/access/edit/id/'.$id);
                }
            }else{
                $Session->setFlash("message", " Unable to get to the data");
                redirect('/access/edit/id/'.$id);
            }
            
            
        }else if($input->getMethod() == 'GET'){
            $id = !empty($_GET['id']) ? check_input($_GET['id']) : false;
            $accessone= $access->findOne($id);
            $this->assign('access', $accessone);
            $this->display('access/edit.html');
        }
        
    }
            
}

