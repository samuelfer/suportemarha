<DOCTYPE html>
<html lang="pt-br">
	 <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Desenvolvimento PBSoft</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/dashboard.css" rel="stylesheet">
    <!--MEU ESTILO-->
    <link href="assets/css/stylo.css" rel="stylesheet">

    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class"container" style="background-color:#428bca;color:#fff">
				<h3>Sistema de Controle de Suporte</h3>
			</div>
		</nav>
			
		
		<div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Fazer login no Sistema</div>
                        
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/suportemarha/baixei/Acme/Models/UserModel.php');
//include_once("includes/header.php");


if (isset($_POST['logar'])) {
	
	$user = new Acme\Models\UserModel;

	if (empty($_POST['email']) || empty($_POST['senha'])) {
		$msg = '<div class="alert alert-danger" role="alert">
 				<strong>Erro!</strong> Preencha todos os campos!!!.
				</div>';
	}else{
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$msg = '<div class="alert alert-danger" role="alert">
 				    <strong>Erro!</strong> Informe o seu email corrtamente!!!.
				    </div>';
		}else{

			$email = "'".$_POST['email']."'";
			$senha = sha1($_POST['senha']."pbs#");
			$senha = "'".$senha."'";
			
			
			$userEncontrado = $user->findByIdTeste('email', $email, 'senha', $senha);
			if ($userEncontrado) {
				session_start();
				$_SESSION['id'] = $userEncontrado->id;
				$_SESSION['nome'] = $userEncontrado->nome;
				$_SESSION['email'] = $userEncontrado->email;
				$_SESSION['nivel'] = $userEncontrado->nivel;
				$_SESSION['logado'] = 1;
				header("Location: menu.php");
				exit();
			}
		}
	}
}
//MENSAGEM DE SUCESSO
if (empty($msg)) {
	$display = "display: none;";
}else{
	$display = "display: block;";
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Controle de Suporte</title>

</head>

<body>
	
	
		<div class="message"style="<?php echo $display; ?>"><?php echo $msg; ?></div>
		<!--<div class="logo"><img src="assets/imagens/logo.png" alt="" title="" width="200" height="58"/></div><br />-->
		<div class="acomodar">
			<form  method="post" action="" class="form-horizontal" role="form">
				<input type="hidden" name="logar">
				 <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="email" type="text" class="form-control" name="email" value="" placeholder="email">                                        
                </div>
                           
				<div style="margin-bottom: 25px" class="input-group">
                 	<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                   	<input id="senha" type="password" class="form-control" name="senha" placeholder="senha">
                </div>
                        
				
			<div style="margin-top:10px" class="form-group">
	            <!-- Button -->

	            <div class="col-sm-12 controls">
	            	
	              <button class="btn btn-success" type="submit">Entrar no Sistema</button>
	            </div>
	        </div>  
	    </form>     

		</div><!--Acomodar-->
	</div><!--Login-->
</body>
</html>
