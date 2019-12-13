<?php
namespace Application\Core;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $arr = require '../Application/Config/Routes.php';
        foreach ($arr as $key => $val){
            $this->add($key, $val);
        }
    }

    public function add($route, $params){
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;

    }

    public function match(){
        $url = $_SERVER['REQUEST_URI'];
        foreach ($this->routes as $route => $params){
            if (preg_match($route, $url, $matches)){
              $this->params = $params;
              return true;
            }
        }
        return false;

    }

    public function run(){
        if($this->match()){
            echo '123';
        }
    }
}