<h1>Listar Categoria</h1>
<a href="/categorias/nova" class="btn btn-outline-primary">Novo Categoria</a>

<table class="table table-hover table-stripred">
  <thead class="table-dark">
    <tr>
      <th>#id</th>
      <th>Nome</th>
      <th>Descrição</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($category = $data->fetch(PDO::FETCH_ASSOC)) {
      // $id = $category['id'];
      // $name = $category['name'];
      // $description = $category['description'];

      // igual a desconstrutor js
      extract($category);

      echo '<tr>';

      echo "<td>{$id}</td>";
      echo "<td>{$name}</td>";
      echo "<td>{$description}</td>";

      echo "<td>
        <a href='/categorias/editar?id={$id}' class='btn btn-warning btn-sm'>Editar</a>
        <a href='/categorias/excluir?id={$id}' class='btn btn-danger btn-sm'>Excluir</a>
      </td>";

      echo '</tr>';
    }
    ?>
  </tbody>
</table>
