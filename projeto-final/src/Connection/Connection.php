<?php

declare(strict_types=1);

namespace App\Connection;



use PDO;

abstract class Connection
{
  public static function getConnection(): PDO
  {
    $database = 'db_store';
    $username = 'root';
    $password = 'livre';

    return new PDO('mysql:host=127.0.0.1;dbname='.$database,$username,$password);
  }
}
