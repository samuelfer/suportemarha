<?php include_once 'menu.php';
require_once($_SERVER['DOCUMENT_ROOT'].'/suportemarha/baixei/Acme/Models/UserModel.php');
?>


  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-md-12">
      <h1 class="page-header">Cadastro de Usuário</h1>
    </div>
    
    <div class="col-md-12">
    	<?php
if (isset($_POST['cadastrar'])) {
  
  $user = new Acme\Models\UserModel;

  $emailUser = "'".$_POST['email']."'";

  $userEncontrado = $user->findBy('email', $emailUser);

  if (!$userEncontrado) {
    $cadastrado = $user->create(
      [
        'email' => $_POST['email'],
        'nome' => $_POST['nome'],
        'senha' => sha1($_POST['senha']."pbs#")
      ]

    );
    //Antes de cadastrar verificar se o usuário existe na base de dados
    if($cadastrado){
      $mensagem = '<h4 id="div-msg"><div  class="ui success message">
               <div class="header">Usuário cadastrado com sucesso! </div>
            </div></h4>';
    }else{
      $mensagem = '<h4 id="div-msg"><div class="ui error message">
              <div class="header">Erro ao tentar cadastrar! </div>
            </div></h4>';
    }
  }else{
      echo '<h4 id="div-msg"><div class="ui error message">
              <div class="header">Esse usuário já foi cadastrado! </div>
            </div></h4>';
  }
}
//Verificar que quando tento atualizar sem ter mudado nada mostra a msg de erro
//Atualizar
if (isset($_POST['atualizar'])) {
  
  $user = new Acme\Models\UserModel;

  //$userEncontrado = $user->findBy('login', $_POST['login']);

  //if (!$userEncontrado) {

    $atualizado = $user->update($_POST['id'],[

      'nome' => $_POST['nome'],
      'email' => $_POST['email']
    ]);
    if($atualizado == 1){

      $mensagemUpdate = '<h4 id="div-msg" ><div class="ui success message">
                 <div class="header">Usuário atualizado com sucesso! </div>
               </div></h4>';
    //header('Location: /minhas-pastas/gravar/');
    }else{
      $mensagemUpdate = '<h4 id="div-msg" ><div class="ui error message">
                <div class="header">Erro ao tentar atualizar o usuário! </div>
               </div></h4>';
    }
  ////}else{
    //  echo '<h4 id="div-msg"><div class="ui error message">
    //          <div class="header">Esse login já foi cadastrado! </div>
    //        </div></h4>';
  }



//Deletar
if (isset($_GET['excluir']) && $_GET['excluir'] == true) {
  $user = new Acme\Models\UserModel;
  $deletado = $user->delete('id',$_GET['id']);

  if ($deletado) {
      echo("<script type='text/javascript'> alert('Usuário excluido com sucesso!'
          ); location.href='inicio.php';</script>");

  }
}

?>
<?php
  echo (isset($mensagemUpdate) ? $mensagemUpdate : '');
  echo (isset($mensagem) ? $mensagem : '');
?>

<form  action="" method="post">
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control"  name="nome" id="nome" placeholder="Informe um nome" value="<?php if (isset($data)) echo $data['nome']; ?>" >
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Informe um email" value="<?php if (isset($data)) echo $data['email']; ?>">
    </div>
    <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
    </div>
      <input type="submit" class="btn btn-primary" value="Cadastrar Usuário" name="SendPostForm">
      <input type="hidden" name="cadastrar">
</form>
  </div>
  </div>
  </div>
  </div>