<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 打印函数
 */
if(!function_exists('p')){
    function  p($par){
        if(is_string($par)){
            var_dump($par);
        }else if(is_array($par)){
            echo '<pre>';
            var_dump($par);
            echo '</pre>';
        }else if(is_object($par)){
            print_r($par);
        }
    }
}


if(!function_exists('redirect')){
    /**
    * URL跳转
    * @param string $url 跳转地址
    * @param int $time 跳转延时(单位:秒)
    * @param string $msg 提示语
    */
    function redirect($url, $time = 0, $msg = '') {
	$url = str_replace(array("\n", "\r"), '', $url); // 多行URL地址支持
	if (empty($msg)) {
		$msg = "系统将在 {$time}秒 之后自动跳转到 {$url} ！";
	}
	if (headers_sent()) {
		$str = "<meta http-equiv='Refresh' content='{$time};URL={$url}'>";
		if ($time != 0) {
			$str .= $msg;
		}
		exit($str);
	} else {
		if (0 === $time) {
			header("Location: " . $url);
		} else {
			header("Content-type: text/html; charset=utf-8");
			header("refresh:{$time};url={$url}");
			echo($msg);
		}
		exit();
	}
    }
}
if(!function_exists('getFlash')){
    function getFlash($name){
        $message = app\controller\baseController::$_session->getFlash($name); 
        return empty($message) ? $message : '';
        
    }
}

if(!function_exists('check_input')){
    function check_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}






