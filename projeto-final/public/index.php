<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>

</body>

</html>

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
