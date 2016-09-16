<?php 
include_once 'menu.php';
require_once 'Acme/Models/ClienteModel.php';
?>

<?php if(isset($_GET['edit']) && $_GET['edit'] == true){?>

<?php 

	$cliente = new Acme\Models\ClienteModel;
	$clienteEncontrado = $cliente->findBy('id', $_GET['id']);

?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-md-12">
      <h1 class="page-header">Atualização de Cliente</h1>
    </div>

    <div class="col-md-12">

<form class="ui form" method="post" action="cadastrar-cliente.php">
	
	 <div class="row">
		<div class="form-group col-md-2">
			<label>Código</label>
			<input type="text" class="form-control" name="id" value="<?php echo $clienteEncontrado->id; ?>">
			<input type="hidden" name="id" value="<?php echo $clienteEncontrado->id; ?>">
		</div>
	
	<div class="form-group col-md-4">
		<label>Cliente</label>
		<input type="text" class="form-control" name="de_cliente" value="<?php echo $clienteEncontrado->de_cliente;?>">
	</div>
</div>
	<button class="btn btn-primary" type="submit">Atualizar</button>
    <input type="hidden" name="atualizar">
</form>
<?php 
}else{
	echo 'Escolha um <b>Cliente</b>';
}

?>
</div>