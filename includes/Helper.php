<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getHash($string) {
    return hash('sha256', $string);
}

//function autoload($className) {
//    $file = dirname(__FILE__) . '/' . $className . '.php';
//    if (file_exists($file)) {
//        require $file;
//    }
//}
//spl_autoload_register('autoload');