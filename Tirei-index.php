<?php
session_start();

require_once "classes/Conexao.class.php";
require_once "classes/Login.class.php";

if (isset($_POST['ok'])) {
	$login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_MAGIC_QUOTES);
	$senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_MAGIC_QUOTES);

	$l = new Login;
	$l->setLogin($login);
	$l->setSenha($senha);

	if ($l->logar()) {
		header("Location: logado.php");
		//exit();
	}else{
		$erro = 'Erro ao tentar logar!!!';
	}
}

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <meta name="description" content="Página de login">
    <meta name="author" content="Marhasoft">
    <link rel="icon" href="imgens/favicon.ico">
    <title>MarhaSystems</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>

  </head>

  <body>
  
    <div class="container">
	<?php echo isset($erro) ? $erro : ''; ?>
      <form class="form-signin" method="POST" action="">
        <h2 class="form-signin-heading text-center">Login do sistema</h2>
        <label for="inputEmail" class="sr-only">Usu&aacute;rio</label>
        <input type="text" name="login" class="form-control" placeholder="Digitar o Usu&aacute;rio" required autofocus><br />
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="senha" class="form-control" placeholder="Digite a Senha" required>
        
        <input class="btn btn-lg btn-primary btn-block" name="ok" type="submit" value="Logar">
		<p class="text-center text-danger">
		</p>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
