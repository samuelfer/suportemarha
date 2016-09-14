<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="/gravar/public/assets/css/style.css">
</head>

<body>
	<div id="topo"><h3>Sistema de Cadastro</h3></div>
	<div id="cadastrar">Cadastrar</a></div>
	<div id="login" class="form bradius">
		<div class="message"></div>
		<div class="logo"></div>
		<div class="acomodar">
			<form  method="post" action="?acao=cadastrar">
				<label for="nome">Nome:</label><input id="nome" type="text" class="txt bradius" name="nome" value=""/>
				<label for="email">E-mail:</label><input id="email" type="text" class="txt bradius" name="email" value=""/>
				<label for="senha">Senha:</label><input id="senha" type="password" class="txt bradius" name="senha" value=""/>
				<input type="submit" class="sb bradius" value="Cadastrar"/>
				
			</form>
		</div><!--Acomodar-->
	</div><!--Login-->
</body>
</html>
