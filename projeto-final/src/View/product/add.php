<h1>Adicionar produto</h1>

<form action="" method="Post">

    <label for="category">Categoria</label>
    <select id="category" name="category" type="text" class="form-control mb-3">
      <option selected> -- Selecione --</option>

      <?php
        while ($category = $data->fetch(\PDO::FETCH_ASSOC)) {
          extract($category);
          echo "<option value='{$id}'>{$name}</option>";
        }
      ?>
    </select>

  <label for="name">Nome</label>
  <input id="name" name="name" type="text" class="form-control mb-3">

  <label for="description">Descrição</label>
  <textarea id="description" name="description" type="text" class="form-control mb-3"></textarea>

  <label for="price">Preço</label>
  <input id="price" name="price" type="text" class="form-control mb-3">

  <label for="quantity">Quantidade</label>
  <input id="quantity" name="quantity" type="text" class="form-control mb-3">

  <label for="created_at">Data de Cadastro</label>
  <input id="created_at" name="created_at" type="text" class="form-control mb-3">

</textarea>

  <button class="btn btn-primary mb-3">Cadastrar</button>
</form>
