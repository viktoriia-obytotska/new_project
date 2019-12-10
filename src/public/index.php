<?php

require __DIR__.'/../vendor/autoload.php';
const ROOT_DIR = __DIR__;
const COOKIE_SESSION_ID = 'old_session_id';
if (isset($_COOKIE[COOKIE_SESSION_ID])){
    session_id($_COOKIE[COOKIE_SESSION_ID]);
}
session_start();
require_once ROOT_DIR . '/../php/helpers/database.php';
$mainConnect = getConnect('main');
$GLOBALS['main_connect'] = $mainConnect;
$isAuth = false;
if (isset($_SESSION['auth_user'])){
    $isAuth = true;
}
$uri = explode('?', $_SERVER['REQUEST_URI'])[0];

switch (mb_strtolower($uri)){
    case '/':{
        require_once ROOT_DIR . '/../php/views/main.php';
        break;
    }
    case '/views/register':{
        if($isAuth){
            echo 'Permission denied'; die;
        }
        require_once ROOT_DIR . '/../php/views/register.php';
        break;
    }
    case '/execute/register':{
        if($isAuth){
            echo 'Permission denied'; die;
        }
        require_once ROOT_DIR . '/../php/execute/register.php';
        break;
    }
    case '/login':{
        if($isAuth){
            echo 'Permission denied'; die;
        }
        require_once ROOT_DIR . '/../php/execute/login.php';
        break;
    }
    case '/views/login':{
        if($isAuth){
            echo 'Permission denied'; die;
        }
        require_once ROOT_DIR . '/../php/views/login.php';
        break;
    }
    case '/views/welcome':{
        if(!$isAuth){
            echo 'Permission denied'; die;
        }
        require_once ROOT_DIR . '/../php/views/welcome.php';
        break;
    }
    case '/logout':{
        if($isAuth){
            echo 'Permission denied'; die;
        }
        require_once ROOT_DIR . '/../php/execute/logout.php';
        break;
    }
    default;{
        echo 'Page not found';die;
    }
}