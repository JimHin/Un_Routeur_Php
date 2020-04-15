<?php

require 'vendor/autoload.php';

$router = new App\Router($_GET['url']);

$router->get('/posts', function(){ echo 'Tous les posts';});
$router->get('/posts/:id', function($id){ echo "afficher le post n°".$id;});
$router->post('/posts/:id', function($id){ echo "poster le post n°".$id;});