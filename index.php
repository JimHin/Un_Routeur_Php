<?php

require 'vendor/autoload.php';

//die($_GET['url']);

$router = new App\Router\Router($_GET['url']);
$router->get('/', function(){ echo 'je suis à l\'index';});
$router->get('/:id', function($id){ echo 'je suis à la page'.$id;});
$router->get('/posts', function(){ echo 'Tous les posts';});
$router->get('/posts/:id', function($id){ 
?>
<form action="" method="post">
    <input type="text" name="name" id="">
    <button type="submit">Envoyer</button>
</form>
<?php
});
$router->post('/posts/:id', function($id){ echo "poster le post n°".$id;});

$router->drive_check();






