<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\controller;
use core\lib\model as model;//导入数据类
use app\model\userModel as userModel;

class indexController extends baseController
{
    
    public static $usermodel = null;
    public function __construct() {
        if(self::$usermodel==null){
            self::$usermodel = new \app\model\usersModel();
        }
        parent::__construct();
    }

    public function indexAction()
    {
       
        $this->display('index/index.html');
        
        
    }
    
     public function userAction()
    {
       // 原始使用PDO
        $model = new \core\lib\model();
        $sql = "SELECT * FROM users";
        $res = $model ->query($sql);
        $list = $res->fetchAll();
        p($list);
    }
    
    public function dumpAction()
    {
      dump($_SERVER);
    }
    
    public function  medooAction(){
       $medoo = new model();
       dump($medoo);
        
    }
    
     
    public function  selectAction(){
       $database = new userModel();
       // 一般项目中使用不建议在控制器中使用SQL语句
       $datas = $database->select("users", ["id","name"],["id[>]" => 1]);
       echo $database->last();
       dump($datas); 
    }
    
    
    public function getuserAction(){
      // $db =  new \app\model\usersModel();
     //  $lists =  $db->getUser();
      // dump($lists);
       
       $list = self::$usermodel->getUser();
       dump($list);
    }
    
    
    
    public function tempAction(){
        //https://twig.sensiolabs.org/doc/2.x/templates.html 手册
        $this->assign('data','twigeee');
        $this->display('temp.html');
    }
    



    public function  showAction(){
        
        $data= 'Hello World';
        $this->assign('data',$data);
        $this->display('index.html');
        var_dump(111);
    }
    
    public function  configAction(){

       $file = 'route';
       $temp = \core\lib\config::get('ACTION', $file);
       $temp1 = \core\lib\config::get('CONTROLLER', $file);
       var_dump($temp);
       var_dump($temp1);
    }
}

