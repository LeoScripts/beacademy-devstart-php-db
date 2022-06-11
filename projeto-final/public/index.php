<?php

include '../vendor/autoload.php';

use App\Controller\IndexController;
use App\Controller\ProductController;
use App\controller\CategoryController;
use App\Controller\ErrorController;


$url = explode('?', $_SERVER['REQUEST_URI'])[0];

function CreateRoute(string $controllerName, string $methodName){
    return [
        'controller' => $controllerName,
        'method' => $methodName,
    ];
}

$routes=[
    '/' => CreateRoute(IndexController::class, 'indexAction'),
    '/produtos' => CreateRoute(ProductController::class, 'listAction'),
    '/produtos/novo' => CreateRoute(ProductController::class, 'addAction'),
    '/produtos/editar' => CreateRoute(ProductController::class, 'editAction'),
    '/categoria' => CreateRoute(CategoryController::class, 'listAction'),
    '/categoria/novo' => CreateRoute(CategoryController::class, 'addAction'),
    '/categoria/edit' => CreateRoute(CategoryController::class, 'editAction'),
];

if(false === isset($routes[$url])){
    (new ErrorController()) ->notFoundAction();
    exit;
}

$controllerName = $routes[$url]['controller'];
$methodName = $routes[$url]['method'];

(new $controllerName()) -> $methodName();
