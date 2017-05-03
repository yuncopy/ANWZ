<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 打印函数
 */
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
