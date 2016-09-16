<?php 
/*require "init.php";*/
/*if(!isset($_SESSION)) 
    { 
        session_start(); 
    
	if($_SESSION['logado'] != '1'){
		unset ($_SESSION['id']);
		unset ($_SESSION['email']);
		unset ($_SESSION['nivel']);
		unset ($_SESSION['logado']);
			
    	header("Location: login.php"); 
    	exit();
	} else {
   		$idUsuario = $_SESSION['id'];
	}
}*/

//SÓ DEIXAR OS CAMPOS COM VALORES SETADOS SE ACONTECEU ALGUM ERRO, SENÃO LIMPAR OS CAMPOS
require_once 'Acme/Models/UserModel.php';
require_once 'Acme/Classes/ValidarCampo.php';
require_once 'menu.php';

 ?>

<?php
$testaCampo = new ValidarCampo;
?>

<?php
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($data['cadastrar'])) {
	
	$user = new Acme\Models\UserModel;

	$usuario = "'".($data['nome'])."'";

	$userEncontrado = $user->findBy('nome', $usuario);

	if (!$userEncontrado) {

		if (!empty($data['nome']) && isset($data['nome']) && !empty($data['email']) && isset($data['email'])) {
			echo $data['nome']  = $testaCampo->retiraTags($data['nome']);
			//echo $data['email'] = $testaCampo->validaEmail($data['email']);
			//echo $data['senha'] = $testaCampo->retiraTags($data['senha']);

			if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
			
				$cadastrado = $user->create(
					[
						'nome'  => $data['nome'],
						'email' => $data['email'],
						'senha' => $data['senha']
					]

				);
				//Antes de cadastrar verificar se o usuário existe na base de dados
				if($cadastrado){
					$mensagem = "<h4 id='div-msg'><div class='alert alert-success' role='alert'><b>Sucesso:</b> O Usuário foi cadastrado no sistema!</div></h4>";
				}else{
					$mensagem = "<h4 id='div-msg'><div class='alert alert-danger' role='alert'><b>Erro:</b> Erro ao tentar cadastrar!</div></h4>";
				}
			}else{
				$mensagem = "<h4 id='div-msg'><div class='alert alert-danger' role='alert'><b>Erro:</b> Os campos devem ser preenchidos!</div></h4>";
			}
		}else{
			echo '<span style="color: red;">Por favor informe um email válido!</span>';
		}
	}else{
		echo "<h4 id='div-msg'><div class='alert alert-danger' role='alert'><b>Erro:</b> Esse usuário já foi cadastrado!</div></h4>";
    }
 }                

//Verificar que quando tento atualizar sem ter mudado nada mostra a msg de erro
//Atualizar
if (isset($_POST['atualizar'])) {
	
	$user = new Acme\Models\UserModel;

	$userEncontrado = $user->findBy('login', $_POST['login']);

	if (!$userEncontrado) {

		echo $data['nome']  = $testaCampo->retiraTags($data['nome']);
		//echo $data['email'] = $testaCampo->validaEmail($data['email']);
		//echo $data['senha'] = $testaCampo->retiraTags($data['senha']);
		if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {

			$atualizado = $user->update($_POST['id'],[

				'nome' => $_POST['nome'],
				'email' => $_POST['email']
			]);
			if($atualizado == 1){

				$mensagemUpdate = "<h4 id='div-msg'><div class='alert alert-success' role='alert'>Usuário atualizado com sucesso!</div></h4>";
			//header('Location: /minhas-pastas/gravar/');
			}else{
				$mensagemUpdate = "<h4 id='div-msg'><div class='alert alert-danger' role='alert'><b>Erro:</b> Erro ao tentar atualizar o usuário!</div></h4>";
			}
		}else{
			echo '<h4 id="div-msg"><div class="ui error message">
		 	      <div class="header">Por favor informe um email válido!</div>
				 </div></h4>';
		}
	}else{
		echo '<h4 id="div-msg"><div class="ui error message">
	 	      <div class="header">Esse login já foi cadastrado no sistema!</div>
	 		 </div></h4>';
	}
}



//Deletar
if (isset($_GET['excluir']) && $_GET['excluir'] == true) {
	$user = new Acme\Models\UserModel;
	$deletado = $user->delete('id',$_GET['id']);

	if ($deletado) {
			echo("<script type='text/javascript'> alert('Usuário excluido com sucesso!'
				  ); location.href='home.php';</script>");

	}
}

?>
<?php

	echo (isset($mensagemUpdate) ? $mensagemUpdate : '');
	echo (isset($mensagem) ? $mensagem : '');

?>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-md-12">
      <h1 class="page-header">Cadastro de Usuário</h1>
    </div>

    <div class="col-md-12">

<form action="" method="post" enctype="multipart/form-data">
    	<div class="row">
    	<div class="form-group col-md-4">
		    <label for="nome">Nome</label>
		    <input type="text" class="form-control"  name="nome" id="nome" placeholder="Informe um nome" value="<?php if (isset($data)) echo $data['nome']; ?>" >
		    <?php if (isset($data)) {$testaCampo->fieldNotEmpty($data['nome']);}?>
	  </div>
	  <div class="form-group col-md-4">
		    <label for="email">Email</label>
		    <input type="email" class="form-control" name="email" id="email" placeholder="Informe um email" value="<?php if (isset($data)) echo $data['email']; ?>">
		    <?php if (isset($data)) {$testaCampo->fieldNotEmpty($data['email']);}?>
	  </div>
	  <div class="form-group col-md-4">
		    <label for="senha">Senha</label>
		    <input type="password" class="form-control" name="senha" id="senha" placeholder="Password">
		    <?php if (isset($data)) {$testaCampo->fieldNotEmpty($data['senha']);}?>
	  </div>
	</div>
	  <button class="btn btn-primary" type="submit"><i class="check green icon"></i>Cadastrar</button>
	  	<input type="hidden" name="cadastrar">
</form>
  </div>
  </div>
  </div>
  </div>
