<?php 
include_once 'menu.php';
require_once 'Acme/Models/UserModel.php';
?>

<?php if(isset($_GET['edit']) && $_GET['edit'] == true){?>

<?php 

	$usuario = new Acme\Models\UserModel;
	$usuarioEncontrado = $usuario->findBy('id', $_GET['id']);

?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-md-12">
      <h1 class="page-header">Atualização de Usuário</h1>
    </div>

    <div class="col-md-12">

<form class="ui form" method="post" action="cadastrar-usuario.php">
	
	 <div class="row">
		<div class="form-group col-md-2">
			<label>Código</label>
			<input type="text" class="form-control" name="id" value="<?php echo $usuarioEncontrado->id; ?>">
			<input type="hidden" name="id" value="<?php echo $usuarioEncontrado->id; ?>">
		</div>
	
	<div class="form-group col-md-4">
		<label>Nome</label>
		<input type="text" class="form-control" name="nome" value="<?php echo $usuarioEncontrado->nome;?>">
	</div>
	<div class="form-group col-md-4">
		<label>Email</label>
		<input type="text" class="form-control" name="email" value="<?php echo $usuarioEncontrado->email;?>">
	</div>
</div>
	<button class="btn btn-primary" type="submit">Atualizar</button>
    <input type="hidden" name="atualizar">
</form>
<?php 
}else{
	echo 'Escolha um <b>Usuário</b>';
}

?>
</div>