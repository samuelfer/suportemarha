<?php 
require_once 'Acme/Models/ClienteModel.php';
include_once 'menu.php';?>

<?php
  $cliente = new Acme\Models\ClienteModel;
  $clientes = $cliente->read();
  //dump($user);
?>

  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-md-6">
      <h1 class="page-header">Clientes</h1>
    </div>
    <div class="col-md-2">
      <a class="btn btn-primary btn-block" href="cadastrar-cliente.php">Novo</a>
    </div>
    <div class="col-md-10">
      <table class="table table-striped">
        <tr>
          <th>id</th>
          <th>Nome</th>
          <th>Ações</th>
         
        </tr>
        <tr>
           <?php
               foreach ($clientes as $cliente) :

           ?>
          <td><?php echo $cliente->id; ?></td>
          <td><?php echo ($cliente->de_cliente);?></td>
          <td><a href="editar-cliente.php?edit=true&id=<?php echo $cliente->id;?>" class="btn btn-primary">Editar</a>
        <a href="?excluir=true&id=<?php echo $cliente->id;?>" class="btn btn-danger">Excluir</a></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
  </div>
  </div>
