<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\Connection;

class ProductController extends AbstractController
{
  public function listAction(): void
  {
    $con = Connection::getConnection();

    $result = $con->prepare('SELECT * FROM tb_product');
    $result->execute();

    parent::render('product/list');
  }

  public function addAction(): void
  {
    $con = Connection::getConnection();

    if($_POST) {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $photo = $_POST['photo'];
      $price = $_POST['price'];
      $quantity = $_POST['quantity'];
      $categoryId = $_POST['category_id'];
      $createdAt = date('Y-m-d H:i:s');

      $query = "INSERT INTO tb_product (name, description, price, photo, quantity, category_id, crated_at)
      VALUES
      ('{$name}','{$description}','{$price}','{$photo}','{$quantity}','{$categoryId}','{$createdAt}')
      ";
      echo 'Produto adcionado com sucesso';
    }

    $result = $con->prepare('SELECT * FROM tb_product');
    $result->execute();

    parent::render('product/add', $result);
  }

  public function editAction(): void
  {
    parent::render('product/edit');
  }
}
