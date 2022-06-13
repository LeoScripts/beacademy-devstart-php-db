<?php

declare(strict_types=1);

namespace App\Connection;

abstract class Connection 
{
  public static function getConnection(): \PDO
  {
    $database='mysql';
    $username='root';
    $password='12345';
    
    return new PDO('mysql:host=localhost;dbname='.$database,$username,$password);
  }
}
