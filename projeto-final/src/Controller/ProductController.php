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

  public function removeAction(): void
  {
    $id = $_GET['id'];
    $con = Connection::getConnection();

    $query = "DELETE FROM tb_product WHERE id='{$id}'";

    $result = $con->prepare($query);
    $result->execute();

    // $message = 'Pronto, produto excluido';

    // include dirname(__DIR__).'/View/_partials/message.php';

    parent::renderMessage('Pronto, produto excluido');
  }

  public function editAction(): void
  {
    $id = $_GET['id'];
    $con = Connection::getConnection();

    $categories = $con->prepare('SELECT FROM tb_category');
    $categories->execute();

    if($_POST) {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $photo = $_POST['photo'];
      $quantity = $_POST['quantity'];

      $query = "
        UPDATE tb_product SET
          name='{$name}',
          description='{$description}',
          price='{$price}',
          photo='{$photo}',
          quantity='{$quantity}'
        WHERE id='{$id}'
      ";

      $resultUpdate = $con->prepare($query);
      $resultUpdate->execute();

      echo 'Produto atualizado';
    }

    $query = " FROM tb_product WHERE id='{$id}'";

    $result = $con->prepare($query);
    $result->execute();

    parent::render('product/edit', $categories);
  }

  public function reportAction(): void
  {

    $con = Connection::getConnection();

    $result = $con->prepare('SELECT prod.name,  prod.quantity, cat.name as category FROM tb_product prod INNER JOIN tb_category cat ON prod.category_id = cat.id');
    $result->execute();

    $content = '';

    while($product = $result->fetch(\PDO::FETCH_ASSOC)){
      extract($product);

      $content .= "
        <tr>
          <td>{$id}</td>
          <td>{$name}</td>
          <td>{$quantity}</td>
          <td>{$category}</td>
        </tr>
      ";
    }

    $html = "
      <h1>Relatorios de produtos no estoque</h1>

      <table border='1' whdth='100%'>
        <thead>
          <tr>
            <th>#ID</th>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>Categoria</th>
          </tr>
        </thead>
        <tbody>
          {$content}
        </tbody>
      </table>
    ";

    $pdf = new DomPdf();
    $pdf->loadHtml($html);

    $pdf-render();
    $pdf->stream();
  }
}
