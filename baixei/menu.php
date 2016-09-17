<?php 

  if(!isset($_SESSION)) 
    { 
        session_start(); 
   
  
  if($_SESSION['logado'] != '1'){
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['nome']);
    unset($_SESSION['email']);
    unset($_SESSION['nivel']);
    unset($_SESSION['logado']);
      
      header("Location: login.php"); 
      exit();
  } else {
      $idUsuario = $_SESSION['id'];
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
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
    <script type="text/javascript">
    $(document).ready(function(){

      /*$('h4').css("color", "#f66");*/
      /*$('h1').hide();*/
      $('h4').delay('2000');
      /*$('h4').css("color", "#f66");*/
      $('h4').fadeOut("slow");
    })


  </script>
  <style>
  #div-msg {
  /*margin-top: 80px;*/
  z-index: 4;
  /*float: right;*/
  /*background: #d9edf7;*/
  /*padding: 5px;*/
  /*font-size: 15px;*/
  /*font-family: Verdana,sans-serif;*/
  /*color: #31708f;*/
  /*border: 1px solid #bce8f1;*/
  /*line-height: 3.5;*/
  position: absolute;
  left: 38%;
  top: 50px;
}
</style>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Controle de Suporte</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Configuração</a></li>
            <li><a href="#">Bem vindo - <?php  echo $_SESSION['nome']."! - "; ?> <span><?php echo date('d-m-Y'); ?></span></a></li>
          </ul>
          <!--<form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>-->
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="inicio.php">Início<span class="sr-only">(current)</span></a></li>
            <li><a href="cadastrar-usuario.php">Cadastrar Usuário</a></li>
            <li><a href="lista-user.php">Listar Usuário</a></li>
            <li><a href="cadastrar-suporte.php">Cadastrar Suporte</a></li>
            <li><a href="lista-suporte.php">Listar Suporte</a></li>
            <li><a href="cadastrar-cliente.php">Cadastrar Cliente</a></li>
            <li><a href="lista-cliente.php">Listar Cliente</a></li>
            <li><a href="logout.php">Sair do Sistema</a></li>
          </ul>
        </div>
        
      

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
