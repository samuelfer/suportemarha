<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/suportemarha/baixei/Acme/Models/UserModel.php');
//require_once 'Acme/Models/UserModel.php';
include_once 'menu.php';?>

<?php
  $usuario = new Acme\Models\UserModel;
  $usuarios = $usuario->read();
  //dump($user);
?>

  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-md-8">
      <h1 class="page-header">Usuários</h1>
    </div>
    <div class="col-md-2">
      <a class="btn btn-primary btn-block" href="cadastrar-cliente.php">Novo</a>
    </div>
    <div class="col-md-10">
      <table class="table table-striped">
        <tr>
          <th>id</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Ações</th>
         
        </tr>
        <tr>
           <?php
               foreach ($usuarios as $usuario) :

           ?>
          <td><?php echo $usuario->id; ?></td>
          <td><?php echo ($usuario->nome);?></td>
          <td><?php echo ($usuario->email);?></td>
          <td><a href="editar-usuario.php?edit=true&id=<?php echo $usuario->id;?>" class="btn btn-primary">Editar</a>
        <a href="?excluir=true&id=<?php echo $usuario->id;?>" class="btn btn-danger">Excluir</a></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
  </div>
  </div>
