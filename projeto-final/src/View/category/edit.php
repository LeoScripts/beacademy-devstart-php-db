<h1>Editar Categoria</h1>
<?php extract($data); ?>
<form action="" method="Post">
  <label for="name">Nome</label>
  <input value="<?php echo $data['name']; ?>" id="name" name="name" type="text" class="form-control mb-3">

  <label for="description">Descrição</label>
  <textarea id="description" name="description" type="text" class="form-control mb-3"><?php echo $data['description']; ?></textarea>

  <button class="btn btn-primary mb-3">Atualizar</button>
</form>
