<?php

ini_set('display_errors', 1);
include '../vendor/autoload.php';

// instanciando direto no index principal -------------------------------------------------

// $database='mysql';
// $username='root';
// $password='12345';


// // string de concção
// $connection = new PDO('mysql:host=localhost;dbname='.$database,$username,$password);


// ----------- recebendo a conecção feita no connectio -------------------------
// use App\Connection\Connection;

// $connection = Connection::getConnection();

// // query no banco
// $query = 'SELECT * FROM tb_category';
// // recebendo a query no antes de executar
// $preparacao = $connection->prepare($query);
// // executando o nosso codigo
// $preparacao->execute();

// // fazendo uma chamada fetch e recebendo os dados do banco
// var_dump($preparacao->fetch());

// while($registro = $preparacao->fetch()) {
//   var_dump($registro);
// }

use App\Controller\ErrorController;


$url = explode('?', $_SERVER['REQUEST_URI'])[0];

$routes = include '../src/config/routes.php';

if (false === isset($routes[$url])) {
  (new ErrorController())->notFoundAction();
  exit;
}

$controllerName = $routes[$url]['controller'];
$methodName = $routes[$url]['method'];

(new $controllerName())->$methodName();
