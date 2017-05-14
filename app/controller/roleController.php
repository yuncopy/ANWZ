<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controller;
use core\awz;
use app\model\roleModel;
use Joomla\Input\Input as Input;


class roleController extends baseController
{
    
    public static  $roleModel;
    
    

    public function __construct() {
        if(!self::$roleModel){ 
            self::$roleModel = new roleModel ();
        }
        parent::__construct();
    }


    public function listAction(){
        
        $list = self::$roleModel->listRole();
        if($list){
            $this->assign('list',$list);
        }
        $this->display('role/list.html');
    }
    
    
    
     public function addAction(){
        $input = new Input();
        $Session = awz::session();
        if($input->getMethod() == 'POST'){
            $name = $input->getUsername('name',false);
            $descs = $input->getUsername('descs',false);
            if( $name && $descs ){
                $role_data['name']  = $name;
                $role_data['descs']  = $descs;
                $result = self::$roleModel->addRole($role_data);
                if($result){
                    $Session->setFlash("message", " Add successful");
                    redirect('/role/list');
                }else{
                    $Session->setFlash("message", " Add failure");
                    redirect('/role/add');
                }
            }else{
                $Session->setFlash("message", " Unable to get to the data");
                redirect('/role/add');
            }
        }
        $this->display('role/add.html');
    }
    
    
    //编辑操作
     public function editAction(){
        $input = new Input();
        $Session = awz::session();
        if($input->getMethod() == 'POST'){
            $name = $input->getUsername('name',false);
            $id = $input->get('id',false);
            $descs = $input->getUsername('descs',false);
            $status = $input->get('status',false);
            if( $name && $descs && $id){
                $role_data['name']  = $name;
                $role_data['descs']  = $descs;
                $role_data['status']  = !empty($status ) ? $status : 2 ;
                $result = self::$roleModel->updateRole($id,$role_data);
                if( $result){
                    $Session->setFlash("message", " Update successful");
                    redirect('/role/list');
                }else{
                    $Session->setFlash("message", " Update failure");
                    redirect('/role/edit/id/'.$id);
                }
            }else{
                $Session->setFlash("message", " Unable to get to the data");
                redirect('/role/add');
            }
        }else if($input->getMethod() == 'GET'){
            $id = !empty($_GET['id']) ? check_input($_GET['id']) : false;
            if($id){
                $role = self::$roleModel->updateRole($id);
                $this->assign('role',$role);
                $this->display('role/edit.html'); 
               
            }
        }
        
    }
 
    
        
        
    
}

