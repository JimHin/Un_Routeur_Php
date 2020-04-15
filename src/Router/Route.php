<?php

namespace App\Router;

class Route{

    protected $_path;

    protected $_callable;

    private $_matches;

    public function __construct($path , $callable){
        $this->_path = trim($path, '/');
        $this->_callable = $callable;
    }

    public function match($url){
        $url = trim($url,'/');
        $path = preg_replace('#:([\w]+)#','([^/]+)',$this->_path);
        //echo $path.'<br>';
        $reg = "#^";
        $ex = "$#i";
        $regex = $reg.$path.$ex;
        //print_r($regex);
        if(!preg_match($regex,$url,$matches)){
            return false;
        }
        array_shift($matches);
        $this->_matches = $matches;
        //print_r($this->_matches);
        return true;
    }

    public function call(){
        return call_user_func_array($this->_callable,$this->_matches);
    }

}