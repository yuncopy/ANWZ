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

class articleController extends baseController
{
    
    public function __construct() {
 
        parent::__construct();
    }
   
     public function listAction(){
         echo '文章列表';
    }
  
    // 执行添加用户操作
    public function addAction(){
        
        echo '文章添加';
      
    }
    
    
    //编辑操作
    public function editAction(){
        echo '文章编辑';
    }
            
}

