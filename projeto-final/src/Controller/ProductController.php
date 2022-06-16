<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\Connection;
use Dompdf\Dompdf;

class ProductController extends AbstractController
{
  public function listAction(): void
  {
    $con = Connection::getConnection();

    $result = $con->prepare('SELECT * FROM tb_product');
    $result->execute();

    parent::render('product/list', $result);
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

      $query = "INSERT INTO tb_product (name, description, price, photo, quantity, category_id, created_at)
      VALUES
      ('{$name}','{$description}',{$price},'{$photo}','{$quantity}','{$categoryId}','{$createdAt}')
      ";
      $con = Connection::getConnection();
      $resultAdd = $con->prepare($query);
      $resultAdd->execute();

      echo 'Produto adcionado com sucesso';
    }

    $result = $con->prepare('SELECT * FROM tb_product');
    $result->execute();

    parent::render('product/add', $result);
  }

  public function removeAction(): void
  {
    $id = $_GET['id'];
    $con = Connection::getConnection();

    $query = "DELETE FROM tb_product WHERE id='{$id}'";

    $result = $con->prepare($query);
    $result->execute();

    $message = 'Produto removido com sucesso!';
    $redirect = '/produtos';

    parent::renderMessage($message,$redirect);
  }

  public function editAction(): void
  {
    $id = $_GET['id'];
    $con = Connection::getConnection();

    if($_POST) {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $photo = $_POST['photo'];
      $quantity = $_POST['quantity'];

      $queryUpdate = " UPDATE tb_product SET
          name='{$name}',
          description='{$description}',
          price='{$price}',
          photo='{$photo}',
          quantity='{$quantity}'
        WHERE id={$id}";

      $resultUpdate = $con->prepare($queryUpdate);
      $resultUpdate->execute();

      echo 'Produto atualizado';

    }

    $query = "SELECT * FROM tb_product WHERE id='{$id}'";


    $result = $con->prepare($query);
    $result->execute();

    $data = $result->fetch(\PDO::FETCH_ASSOC);

    parent::render('product/edit', $data);
  }

  public function reportAction(): void
  {

    $con = Connection::getConnection();

    //ex: 3
    // $result = $con->prepare('SELECT prod.id, prod.name,  prod.quantity, cat.name as category FROM tb_product prod INNER JOIN tb_category cat ON prod.category_id = cat.id');
    //ex: 2
    // $result = $con->prepare('SELECT prod.id, prod.name, prod.quantity, cat.name as category FROM tb_product prod, tb_category cat');
    $result = $con->prepare('SELECT prod.id, prod.name, prod.quantity FROM tb_product prod');
    $result->execute();

    $content = '';

    while($product = $result->fetch(\PDO::FETCH_ASSOC)){
      extract($product);

      $content .= "
        <tr>
          <td style='background: #a013;text-align: center;border-right: 0.01rem solid #555;padding: 0.10rem 0.5rem;'>{$id}</td>
          <td style='background: #4452;border-right: 0.01rem solid #555;padding: 0.10rem 0.5rem;'>{$name}</td>
          <td style='background: #f953;text-align: center;padding: 0.10rem 0.5rem;'>{$quantity}</td>
        </tr>
      ";
    }

    $html = "

      <h1 style='font-family: sans-serif; text-align: center;'>Relatorios de produtos no estoque</h1>

      <table style='width:100vw;'>
        <thead style='background: #a0a3;border-right: 0.01rem solid #555;padding: 0.10rem 0.5rem;'>
          <tr>
            <th>#ID</th>
            <th>Nome</th>
            <th>Quantidade</th>
          </tr>
        </thead>
        <tbody>
          {$content}
        </tbody>
      </table>
    ";

    $pdf = new Dompdf();
    $pdf->loadHtml($html);

    $pdf->render();
    $pdf->stream();
  }
}
