<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controller;
use app\model\roleModel;
class roleController extends baseController
{
    
    public static  $roleModel;


    public function __construct() {
        if(!self::$roleModel){ 
            self::$$roleModel = new roleModel ();
        }
        parent::__construct();
    }


    
    
 
    
        
        
    
}

