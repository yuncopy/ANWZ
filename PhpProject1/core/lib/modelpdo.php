<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace core\lib;
use core\lib\config as config;

class modelpdo extends \PDO
{
    public function __construct() {
/**
awzphp      
SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'qqq');
INSERT INTO `users` VALUES ('2', 'wqww');
 */
       // $dsn = 'mysql:host=localhost;dbname=awzphp';
       // $username = 'root';
       // $password = 'root';
        $database = config::getAll( 'database');
        $dsn =  $database['DSN'];
        $username = $database['USERNAME'];
        $password =$database['PASSWORD'];
        try{
            parent::__construct($dsn, $username, $password);
        }catch (\PDOException $e){
            die($e->getMessage());
        }
        
    }
    
}

