<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Legendarium\Router($_SERVER["REQUEST_URI"]);

$router->get('/logout', "UserController@logout");


if(isset($_SESSION['user']['pseudo'])){
    // route pour les utilisateurs connectés

}else{
    $router->get('/login', "UserController@showlogin");
    $router->get('/register', "UserController@showRegister");
    $router->post('/login', "UserController@login");
    $router->post('/register', "UserController@register");
}



$router->get('/', 'BestiaryController@index');
$router->get('/bestiary/show/:id', 'BestiaryController@show');
$router->get('/bestiary/category/:name', 'BestiaryController@category');
$router->get('/bestiary/search', 'BestiaryController@search');



$router->run();
