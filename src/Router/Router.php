<?php

namespace App\Router;

use App\Router\Route;

class Router{

    private $_url;
    private $_routes = [];

    public function __construct($url){
        $this->_url = $url;
    }

    public function get($path, $callable){
        //on instancie une nouvelle route 
        $route = new Route($path,$callable);
        //on range la route dans le tableau: push
        $this->_routes['GET'][] = $route;

    }

    public function post($path, $callable){
        //on instancie une nouvelle route 
        $route = new Route($path,$callable);
        //on range la route dans le tableau: push
        $this->_routes['POST'][] = $route;

    }

    public function drive_check(){
        if (!isset($this->_routes[$_SERVER['REQUEST_METHOD']])) {
            throw new RouterException('La Requête n\'existe pas');//il faut changer le texte ici
        }
        foreach ($this->_routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if($route->match($this->_url)){
                return $route->call();
            }
        }
        throw new RouterException('Aucune route ne correspond');
    }
}