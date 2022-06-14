<?php

declare(strict_types=1);

use App\Controller\IndexController;
use App\Controller\ProductController;
use App\Controller\CategoryController;

function CreateRoute(string $controllerName, string $methodName)
{
  return [
    'controller' => $controllerName,
    'method' => $methodName,
  ];
}

$routes = [
  '/' => CreateRoute(IndexController::class, 'indexAction'),
  '/produtos' => CreateRoute(ProductController::class, 'listAction'),
  '/produtos/novo' => CreateRoute(ProductController::class, 'addAction'),
  '/produtos/editar' => CreateRoute(ProductController::class, 'editAction'),
  '/categoria' => CreateRoute(CategoryController::class, 'listAction'),
  '/categoria/nova' => CreateRoute(CategoryController::class, 'addAction'),
  '/categoria/edit' => CreateRoute(CategoryController::class, 'editAction'),
  '/categoria/excluir' => CreateRoute(CategoryController::class, 'removeAction'),
];

return $routes;
