<?php
session_start();

require_once "classes/Conexao.class.php";
require_once "classes/Login.class.php";

if (isset($_GET['logout'])) {
	if ($_GET['logout'] == 'ok') {
		//$l = new Login;NA CLASSE LOGIN O MÉTODO DESLOGAR É ESTÁTICO, POR ISSO NÃO PRECISO INSTACIAR
		Login::deslogar();
	}
}

if (isset($_SESSION['logado'])) {
?>
<h2 class="form-signin-heading text-center">Logado no sistema com <?php echo $_SESSION['administrador']; ?></h2>
<br />
<a href="logado.php?logout=ok">Sair do Sistema</a>
<?php
}else{
	echo "Voce nao tem permissao!!";
}

?>
